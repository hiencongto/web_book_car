<?php

namespace App\Http\Controllers;

use App\Constants\CommonConstant;
use App\Http\Requests\CreateTripDetailRequest;
use App\Mail\CancelTripMail;
use App\Service\PaymentService;
use App\Service\SeatService;
use App\Service\TripService;
use Illuminate\Http\Request;
use App\Service\TripDetailService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TripDetailController extends Controller
{
    protected $tripDetailService;
    protected $paymentService;
    protected $seatService;
    protected $tripService;

    function __construct(
        TripDetailService $tripDetailService,
        PaymentService $paymentService,
        SeatService $seatService,
        TripService $tripService,
    )
    {
        $this->tripDetailService = $tripDetailService;
        $this->paymentService = $paymentService;
        $this->seatService = $seatService;
        $this->tripService = $tripService;
    }

    /**
     * @param CreateTripDetailRequest $request
     * @return mixed
     */
    public function createTripDetail(CreateTripDetailRequest $request)
    {
        $tripDetail = $this->tripDetailService->createTripDetail($request);

        if ($tripDetail)
        {
            return redirect()->route('show_order_success')
                ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['success_create']]);
        }
        else
            return redirect()->back()
                ->with('msg', 'Seats are sold, please try again!');
    }

    /**
     * @param Request $request
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function showOrderSuccess(Request $request)
    {
        try {
            $user = Auth::guard('user')->user();
            if ($request->vnp_TransactionStatus == 00 && $request->vnp_ResponseCode == 00){
                $data = [
                    'trip_detail_id' => (int) $request->vnp_TxnRef, // Mã tham chiếu đơn hàng từ bảng trip_detail
                    'customer_id' => (int) $user->id,
                    'amount' => $request->vnp_Amount/100, // Số tiền giao dịch
                    'bank_code' => $request->vnp_BankCode, // Mã ngân hàng
                    'bank_tran_no' => $request->vnp_BankTranNo, // Mã giao dịch của ngân hàng
                    'card_type' => $request->vnp_CardType, // Loại thẻ
                    'pay_date' => $request->vnp_PayDate, // Ngày thực hiện thanh toán
                    'response_code' => $request->vnp_ResponseCode, // Mã phản hồi
                    'transaction_no' => $request->vnp_TransactionNo, // Mã giao dịch của VNPAY
                    'transaction_status' => $request->vnp_TransactionStatus, // Trạng thái giao dịch
                ];

                $payment = $this->paymentService->create($data);
                $trip_detail = $this->tripDetailService->query()->find($request->vnp_TxnRef);
                $email = $this->tripDetailService->mailPaymentSuccess($trip_detail);
                $email2 = $this->tripDetailService->mailNotiAdmin($trip_detail);

                if ($payment)
                {
                    return view('customer.trip.order_success');
                }
                return redirect()->back()->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_create']]);
            }
            else{
                $trip_detail = $this->tripDetailService->query()->find($request->vnp_TxnRef);
                $this->seatService->forceDeleteSeatByTripDetail($request->vnp_TxnRef);
                $this->tripDetailService->forceDeleteById($request->vnp_TxnRef);

                if ($trip_detail)
                {
                    $trip_detail_id = $trip_detail->trip()->first()->id;
                    return redirect()->route('show_trip_detail', ['id' => $trip_detail_id])
                        ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_create']]);
                }

                return redirect()->route('list_trip_customer')
                    ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_create']]);
            }
        }
        catch (\Exception $exception)
        {
            return redirect()->route('page-404');
        }
    }

    /**
     * @return void
     */
    public function testDeleteSeat()
    {
        $test = $this->tripDetailService->query()->where('id', 26);
    }

    /**
     * @param $trip_detail_id
     * @return mixed
     */
    public function cancelCustomerFromTrip( $trip_detail_id)
    {
        try {
            $trip_detail = $this->tripDetailService->cancelCustomerFromTrip( $trip_detail_id);

            $email = Mail::to($trip_detail->customer->email)->send(new CancelTripMail($trip_detail));

            if(!$trip_detail)
            {
                return redirect()->back()->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_update']]);
            }

            $this->seatService->forceDeleteSeatByTripDetail($trip_detail_id);
            $trip_id = $this->tripDetailService->query()->find($trip_detail_id)->trip->id;
            return redirect()->route('show_trip_detail_admin', ['id' => $trip_id])
                ->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['success_update']]);
        }
        catch (\Exception $exception)
        {
            return redirect()->route('page_404_admin');
        }
    }

    /**
     * @return \Closure|\Illuminate\Container\Container|mixed|object|null
     */
    public function viewPayment()
    {
        return view('customer.mail.join_trip_success');
    }

    /****/
    /**Driver**/
    /****/

    /**
     * @param $id
     * @param $key
     * @return \Closure|\Illuminate\Container\Container|mixed|object|void|null
     */
    public function updateStatusForTripDetailForDriver( $id,  $key)
    {
        try {
            $update_trip_detail = $this->tripDetailService->update($id, ['status_id' => $key]);
            if ($update_trip_detail)
            {
                $trip = $update_trip_detail->trip;
                $trip_details = $trip->trip_details;

                return view('driver.trip_processing', compact('trip', 'trip_details'));
            }

            return redirect()->back()->with([CommonConstant::MSG => CommonConstant::STATUS_MSG_ARRAY['fail_find']]);
        }
        catch (\Exception $exception)
        {

        }
    }
}
