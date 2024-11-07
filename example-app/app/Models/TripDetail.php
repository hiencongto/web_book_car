<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'trip_details';

    protected $fillable = [
        'customer_id',
        'trip_id',
        'pick_up',
        'drop_off',
        'num_person',
//        'vote',
        'status_id',
//        'cmt',
        'user_note',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id')->withDefault();
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id', 'id')->withDefault();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'trip_detail_id', 'id');
    }

    public function seats()
    {
        return $this->hasMany(Seat::class, 'trip_detail_id', 'id');
    }


}
