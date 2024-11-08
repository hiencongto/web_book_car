<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    // Các cột có thể gán giá trị
    protected $fillable = [
        'trip_detail_id', // Mã tham chiếu đơn hàng từ bảng trip_detail
        'customer_id',
        'amount', // Số tiền giao dịch
        'bank_code', // Mã ngân hàng
        'bank_tran_no', // Mã giao dịch của ngân hàng
        'card_type', // Loại thẻ
        'pay_date', // Ngày thực hiện thanh toán
        'response_code', // Mã phản hồi
        'transaction_no', // Mã giao dịch của VNPAY
        'transaction_status', // Trạng thái giao dịch
    ];

    // Thiết lập quan hệ với model TripDetail
    public function tripDetail()
    {
        return $this->belongsTo(TripDetail::class, 'trip_detail_id');
    }
}
