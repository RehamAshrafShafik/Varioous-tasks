<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'user_id',
        'type',
        'payment_mode',
        'create_date',
        'created_at',
        'updated_at',

        
    ];
    

    /** Request relations */

    public function user() {
        return $this->belongsTo('App\Models\User');
        }
    public function request_info()
    {
        return $this->hasOne(RequestInfo::class);
    }
    public function request_status()
    {
        return $this->hasOne(RequestStatus::class);
    }
}
