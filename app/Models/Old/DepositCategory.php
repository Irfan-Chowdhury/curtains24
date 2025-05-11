<?php

namespace App\Models\Old;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
