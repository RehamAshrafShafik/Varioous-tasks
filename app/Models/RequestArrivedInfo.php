<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestArrivedInfo extends Model
{
    use HasFactory;
        protected $fillable = [

             'request_info_id',
             'arrived_current_distance',
             'passenger_count',
             'arrived_time',
             'created_at',
             'updated_at',
        ];

        /** Relations */
        public function request_info() {
            return $this->belongsTo('App\RequestInfo');
            }
        public function request_finished()
        {
            return $this->hasOne(RequestFinished::class);
        }
}
