<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_title_visible',
        'is_active',
    ];


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
