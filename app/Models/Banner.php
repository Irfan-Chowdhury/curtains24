<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function bannerImageOne()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'banner_image_1');
    }

    public function bannerImageTwo()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'banner_image_2');
    }

}
