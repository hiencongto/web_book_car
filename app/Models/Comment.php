<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu (nếu không đặt tên theo quy ước chuẩn)
    protected $table = 'comments';

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = [
        'customer_id',
        'trip_detail_id',
        'comment',
    ];

    /**
     * Thiết lập quan hệ với model Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Thiết lập quan hệ với model TripDetail
     */
    public function tripDetail()
    {
        return $this->belongsTo(TripDetail::class);
    }
}
