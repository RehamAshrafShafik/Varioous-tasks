<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPassword extends Model
{
    use HasFactory;

   /** @var array
    */

    protected $fillable = [
        'user_id',
        'password',
           'created_at',
        'updated_at',
        
    ];
    public function user() {
        return $this->belongsTo('App\User');
        }

    /** @var array
    */
   protected $hidden = [
       'password',
   ];
}
