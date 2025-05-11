<?php

namespace App\Models\Old;


use Illuminate\Database\Eloquent\Model;

class EmployeeBankAccount extends Model
{
	protected $guarded=[];

	public function employee(){
		return $this->hasOne('App\Models\Old\Employee','id','employee_id');
	}
}
