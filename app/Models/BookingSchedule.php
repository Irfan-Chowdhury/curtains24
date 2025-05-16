<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_name',
        'phone',
        'date',
        'start_time',
        'end_time',
    ];
}
