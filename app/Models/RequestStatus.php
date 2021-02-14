<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_request_id',
        'status',
        'created_at',
        'updated_at',
    
    ];
    public function user_request() {
        return $this->belongsTo('App\Models\UserRequest');
        }
}
