<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    private static $cloudinary_link = 'https://res.cloudinary.com/bigbignoobbb/image/upload/';

    public function getSmallPhotoAttribute()
    {
        if ($this->logo == null || strlen($this->logo) == 0) {
            return '';
        }
        $logo = explode(',', $this->logo);
        return self::$cloudinary_link . 'w_100,c_scale/' . $logo[0] . '.jpg';
    }

    public function getLargePhotoAttribute()
    {
        if ($this->logo == null || strlen($this->logo) == 0) {
            return '';
        }
        $logo = explode(',', $this->logo);
        return self::$cloudinary_link . $logo[0] . '.jpg';
    }
}
