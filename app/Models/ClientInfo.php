<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reward_points',
        'wallet_ballance',
        'rate',
        'unique_code',
        'created_at',
        'updated_at',
      
        
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
        }

}
