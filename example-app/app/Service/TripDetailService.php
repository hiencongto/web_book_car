<?php
namespace App\Service;
use App\Constants\CommonConstant;
use App\Http\Requests\CreateTripDetailRequest;
use App\Mail\NotiForAdminMail;
use App\Mail\PaymentSuccessMail;
use App\Repositories\RepositoryInterface\TripDetailRepositoryInterface;
use App\Service\TripService;
use App\Service\SeatService;
use App\Service\PaymentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TripDetailService
{
    protected $tripDetailRepository;
    protected $tripService;
    protected $seatService;
    protected $paymentService;

    function __construct(
        TripDetailRepositoryInterface $tripDetailRepository,
        TripService $tripService,
        SeatService $seatService,
        PaymentService $paymentService,
    )
    {
        $this->tripDetailRepository = $tripDetailRepository;
        $this->tripService = $tripService;
        $this->seatService = $seatService;
        $this->paymentService = $paymentService;
    }

    public function query()
    {
        return $this->tripDetailRepository->query();
    }

    public function getModel(){
        return $this->tripDetailRepository->getModel();
    }

    /**
     * @param CreateTripDetailRequest $request
     * @return \Closure|false|\Illuminate\Container\Container|mixed|object|null
     */
    public function  createTripDetail(CreateTripDetailRequest $request)
    {
        try {
            if ($this->tripDetailRepository->isExist($request->customer_id, $request->id))
            {
                return redirect()->back()->with([CommonConstant::MSG => 'Error! This customer already request to join trip']);
            }

            $numPeopleArray = explode(',', $request->num_person);  //số khách hàng

            $car_id = $this->tripService->getCarIdByTrip($request->id);

            $data = [
                'customer_id' => $request->customer_id,
                'trip_id' => $request->id,
                'pick_up' => $request->pick_up,
                'drop_off' => $request->drop_off,
                'num_person' => count($numPeopleArray),
                'status_id' => CommonConstant::STATUS_ID['trip_detail_pending'],
                'user_note' => $request->user_note,
            ];

            $tripDetail = $this->tripDetailRepository->create($data);
            if (!$tripDetail)
            {
                return redirect()->back()->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_create']]);
            }

            foreach ($numPeopleArray as $key => $seat_number)
            {
                $dataSeat = [
                    'car_id' => $car_id,
                    'status' => CommonConstant::STATUS_ID['sold'],
                    'seat_number' => $seat_number,
                    'trip_detail_id' => $tripDetail->id,
                    'trip_id' => $request->id,
                ];

                $isSeatAvailable = $this->seatService-> isSeatAvailable($car_id, $seat_number, $request->id);

                if ($isSeatAvailable)
                {
                    $seat = $this->seatService->create($dataSeat);
                    if (!$seat)
                    {
                        return redirect()->back()->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_create']]);
                    }
                }
                else{
                    // xóa trip detail và toàn bộ ghế của trip_detail
                    $deleteSeatOfTripDetail = $tripDetail->seats()->delete();
                    $deleteTripDetail = $this->tripDetailRepository->delete($tripDetail->id);
                    return false;
                    //xong return lại trang trip
                }

            }

            $this->paymentService->payment($tripDetail, true);
            return $tripDetail;
        }
        catch (\Exception $exception)
        {
            return view('404');
        }
    }

    /**
     * @param $tripDetail
     * @param bool $pay
     * @return void
     */
    public function payment($tripDetail, bool $pay)
    {
        $fare = $tripDetail->trip->fare;
        $num_person = $tripDetail->num_person;
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('show_order_success');
        $vnp_TmnCode = "DDWDCSID";//Mã website tại VNPAY
        $vnp_HashSecret = "WK9PC03SROYQZIA302WJHY8ZKAL3MSEL"; //Chuỗi bí mật

        $vnp_TxnRef = $tripDetail->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã sang VNPAY
        $vnp_OrderInfo = 'Pay Order';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $fare * $num_person * 100; //giá
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
//        $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if ($pay) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    /**
     * @param int $id
     * @return void
     */
    public function forceDeleteById( int $id)
    {
        $this->tripDetailRepository->delete($id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findTripDetailByUserId(int $id)
    {
        return$this->tripDetailRepository->query()->where('customer_id', $id)->get();
    }

    /**
     * @param int $trip_detail_id
     * @return false|int
     */
    public function cancelCustomerFromTrip( $trip_detail_id)
    {
        try {
            $data =[
                'status_id' => CommonConstant::STATUS_ID['trip_detail_cancel'],
            ];
            $trip_detail = $this->query()->where('id', $trip_detail_id)->update($data);
            $trip_detail = $this->query()->find($trip_detail_id);
            return $trip_detail;
        }
        catch (\Exception $exception)
        {
            return false;
        }
    }

    /**
     * @param $trip_detail
     * @return \Illuminate\Mail\SentMessage
     */
    public function mailPaymentSuccess($trip_detail)
    {
        $user = Auth::guard('user')->user();
        $mail = Mail::to($user->email)->send(new PaymentSuccessMail($trip_detail));
        if ($mail)
        {
            return $mail;
        }
        return redirect()->back()->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_status']]);
    }

    /**
     * @param int $id
     * @param $data
     * @return mixed
     */
    public function update(int $id, $data = [])
    {
        return $this->tripDetailRepository->update($id, $data);
    }

    /**
     * @param $trip_detail
     * @return \Illuminate\Mail\SentMessage
     */
    public function mailNotiAdmin($trip_detail)
    {
        $mail = Mail::to('nguyentathien_t64@hus.edu.vn')->send(new NotiForAdminMail($trip_detail));
        if ($mail)
        {
            return $mail;
        }
        return redirect()->back()->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_status']]);
    }
}
