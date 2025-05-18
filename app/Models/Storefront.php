<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storefront extends Model
{
    use HasFactory;

    protected $fillable = [
        'slider_heading',
        'slider_description',
        'booking_heading',
        'booking_description',
        'contact_heading',
        'contact_description',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
