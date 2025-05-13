<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}