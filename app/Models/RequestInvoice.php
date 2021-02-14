<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_finished_id',
        'minutes_cost',
        'company_commision',
        'start_amount',
        'promocode_used',
        'pdf',
         'create_date',
         'created_at',
         'updated_at',
    ];
    public function request_finished() {
        return $this->belongsTo('App\RequestFinished');
        }
    public function user_request() {
        return $this->belongsTo('App\UserRequest');
        }
}
