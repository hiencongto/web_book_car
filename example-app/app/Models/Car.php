<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='cars';

    protected $fillable = [
        'type',
        'image',
        'license',
        'car_plate',
        'seat_num',
        'status_id',

    ];
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function trips()
    {
        return $this->hasMany(Trip::class, 'car_id', 'id');
    }

    public function seats()
    {
        return $this->hasMany(Seat::class, 'car_id', 'id');
    }
}
