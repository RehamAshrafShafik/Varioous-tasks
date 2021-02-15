<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name',
        'l_name',
        'mobile',
        'email',
        'password',
        'gender',
       
        
    ];
    // public function fullname(){
    //     return $this->first_name . " " . $this->last_name;
    // }

    /** User relations */

    public function user_password()
    {
        return $this->hasOne(UserPassword::class);
    }

    public function user_picture()
    {
        return $this->hasOne(UserPicture::class);
    }

    public function user_request()
    {
        return $this->hasMany(UserRequest::class);
    }

    public function client_info()
    {
        return $this->hasOne(ClientInfo::class);
    }

    public function client_mode()
    {
        return $this->hasOne(ClientMode::class);
    }
    public function client_account_status()
    {
        return $this->hasOne(ClientAccountStatus::class);
    }

    public function veichles()
    {
        return $this->belongsToMany(Veichle::class)
        ->using(UserVeichle::class)
        ->withPivot('status');
    }
    public function hasVeichle($veichle)
    {
        return $this->veichles()->where('veichle_id', $veichle)->exists();
    }
    /**
     * The attributes that should be hidden for arrays.
     *
    //  * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
