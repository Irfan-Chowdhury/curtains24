<?php

namespace App\Models\Old;

use Illuminate\Database\Eloquent\Model;

class WarningType extends Model
{
	protected $table = 'warnings_type';
	protected $fillable = [
		'warning_title'
	];
}
