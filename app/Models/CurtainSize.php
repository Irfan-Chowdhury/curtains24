<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurtainSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'width_m',
        'width_cm',
        'height_m',
        'height_cm',
        'is_active'
    ];
}
