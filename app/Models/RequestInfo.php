<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_request_id',
        'provider_id',
        'car_id',
        'remaining_distance',
        'accept_time',
        'created_at',
        'updated_at',

        
    ];
    public function request() {
        return $this->belongsTo('App\UserRequest');
        }
    public function request_arrived_info()
    {
        return $this->hasOne(RequestArrivedInfo::class);
    }
}
