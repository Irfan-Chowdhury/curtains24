<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'title_1',
        'title_2',
        'title_3',
        'description_1',
        'description_2',
        'description_3',
    ];

}
