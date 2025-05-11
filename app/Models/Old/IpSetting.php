<?php

namespace App\Models\Old;


use Illuminate\Database\Eloquent\Model;

class IpSetting extends Model
{
    protected $fillable = [
        'name',
        'ip_address'
    ];
}
