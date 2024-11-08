<?php

namespace App\Service;
use App\Repositories\RepositoryInterface\PaymentRepositoryInterface;

class PaymentService{
    protected $paymentRepository;

    function __construct(
        PaymentRepositoryInterface $paymentRepository,
    )
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function test()
    {
        dd($this->paymentRepository->getAll());
    }

    /**
     * @param $tripDetail
     * @param bool $pay
     * @return \Closure|\Illuminate\Container\Container|mixed|object|void|null
     */
    public function payment($tripDetail, bool $pay)
    {
        try {
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

            //var_dump($inputData);
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
        catch (\Exception $exception)
        {
            return view('404');
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data = [])
    {
        return $this->paymentRepository->create($data);
    }
}
