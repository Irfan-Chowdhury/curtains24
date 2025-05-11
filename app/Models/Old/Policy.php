<?php

namespace App\Models\Old;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
	protected $fillable = [
		'title','description','company_id','added_by'
	];

	public function company(){
		return $this->hasOne('App\Models\Old\company','id','company_id');
	}

	public function getCreatedAtAttribute($value)
	{
		return Carbon::parse($value)->format(env('Date_Format'));
	}
}
