<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shop(){
        return $this->hasOne('App\Shop', 'account_id', 'id');
    }

    private static $cloudinary_link = 'https://res.cloudinary.com/bigbignoobbb/image/upload/';

    public function getSmallPhotoAttribute()
    {
        if ($this->avatar == null || strlen($this->avatar) == 0) {
            return '';
        }
        $avatar = explode(',', $this->avatar);
        return self::$cloudinary_link . 'w_100,c_scale/' . $avatar[0] . '.jpg';
    }

    public function getLargePhotoAttribute()
    {
        if ($this->avatar == null || strlen($this->avatar) == 0) {
            return '';
        }
        $avatar = explode(',', $this->avatar);
        return self::$cloudinary_link . $avatar[0] . '.jpg';
    }
}
