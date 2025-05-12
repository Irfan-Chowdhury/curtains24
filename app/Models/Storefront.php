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
        'testimonial_title',
        'contact_title',
        'contact_description',
    ];
}
