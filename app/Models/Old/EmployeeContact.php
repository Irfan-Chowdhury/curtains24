<?php

namespace App\Models\Old;


use Illuminate\Database\Eloquent\Model;

class EmployeeContact extends Model
{
	protected $guarded=[];

	public function employee(){
		return $this->hasOne('App\Models\Old\Employee','id','employee_id');
	}

    public function relationType(){
		return $this->belongsTo(RelationType::class,'relation_type_id');
	}
}
