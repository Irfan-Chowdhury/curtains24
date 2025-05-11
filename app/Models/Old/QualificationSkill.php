<?php

namespace App\Models\Old;

use Illuminate\Database\Eloquent\Model;

class QualificationSkill extends Model
{
	protected $guarded= [];

	public function company(){
		return $this->hasOne('App\Models\Old\company','id','company_id');
	}
}
