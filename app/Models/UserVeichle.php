<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserVeichle extends Pivot
{
    public $incrementing = true;
    protected $fillable = [
    'veichle_id',
    'user_id',
    'status',
    'created_at',
    'updated_at',

];

public function status(){
    return $this->status;
}
}
