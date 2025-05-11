<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_1',
        'title_2',
        'title_3',
        'title_4',
        'title_5',
        'title_6',
    ];
}
