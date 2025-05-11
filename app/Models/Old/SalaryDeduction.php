<?php

namespace App\Models\Old;

use Illuminate\Database\Eloquent\Model;

class SalaryDeduction extends Model
{

	protected $guarded=[];

	public function employee(){
		return $this->hasOne('App\Models\Old\Employee','id','employee_id');
	}

    public function deductionType(){
		return $this->belongsTo(DeductionType::class,'deduction_type_id');
	}

}
