<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $table='seats';

    protected $fillable = [
        'seat_number',
        'car_id',
        'status',
        'trip_detail_id',
        'trip_id',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id' );
    }

    public function tripDetail()
    {
        return $this->belongsTo(TripDetail::class, 'trip_detail_id', 'id');
    }
}
