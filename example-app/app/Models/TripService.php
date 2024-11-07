<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TripService extends Model
{
//    use HasFactory;

    protected $table = 'trip_services';

    protected $fillable = [
        'service_id',
        'trip_id',
        'description',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id', 'id')->withDefault();
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id')->withDefault();
    }
}
