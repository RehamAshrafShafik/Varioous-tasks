<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestFinished extends Model
{
    use HasFactory;
    protected $fillable = [
        'request_arrived_info_id',
        'picked_latitude',
        'picked_longitude',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
    ];


    public function request_arrived_info() {
        return $this->belongsTo('App\RequestArrivedInfo');
        }
    public function request_invoice()
    {
        return $this->hasOne(RequestInvoice::class);
    }
}
