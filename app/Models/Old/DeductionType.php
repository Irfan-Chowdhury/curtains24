<?php

namespace App\Models\Old;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeductionType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['type_name'];

}
