<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Status;
use App\Models\Provider;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $table='users';

    /**
     * @var string[]
     */
    protected $fillable = [
        'email',
        'password',
        'name',
        'address',
        'phone',
        'role',
        'ID_number',
        'provider_id',
        'confirm_token',
        'status_id',
        'old_status_id',
    ];

    /**
     * @var string[]
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
//            ->withDefault();
    }

    public function trips()
    {
        return $this->hasMany(Trip::class, 'driver_id', 'id');
    }

}
