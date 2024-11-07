<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='trips';

    protected $fillable = [
        'driver_id',
        'car_id',
        'destination_id',
        'source_id',
        'time_start',
        'time_end',
        'fare',
        'seat',
        'status_id',
        'description',
    ];



    public function driver()
    {
        return$this->belongsTo(User::class, 'driver_id', 'id')->withDefault();
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id')->withDefault();
    }

    public function destination()
    {
        return $this->belongsTo(City::class, 'destination_id', 'id')->withDefault();
    }

    public function source()
    {
        return $this->belongsTo(City::class, 'source_id', 'id')->withDefault();
    }

//    public function seats()
//    {
//        return $this->hasManyThrough(Seat::class, Car::class, 'id', 'car_id', 'car_id', 'id');
//    }

    public function trip_services()
    {
        return $this->hasMany(TripService::class, 'trip_id', 'id');
    }

    public function trip_details()
    {
        return $this->hasMany(TripDetail::class, 'trip_id', 'id');
    }

}
