<?php

namespace App\Models\Old;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
	protected $fillable = [
		'leave_type_id','company_id','department_id','employee_id','start_date','end_date',
		'leave_reason','remarks','status','is_notify','total_days'
	];

	public function company(){
		return $this->hasOne('App\Models\Old\company','id','company_id');
	}

	public function department(){
		return $this->hasOne('App\Models\Old\department','id','department_id');
	}

	public function LeaveType(){
		return $this->hasOne('App\Models\Old\LeaveType','id','leave_type_id');
	}

	public function employee(){
		return $this->hasOne('App\Models\Old\Employee','id','employee_id');
	}

	// public function employeeLeaveTypeDetail(){
	// 	return $this->hasOne('App\Models\Old\EmployeeLeaveTypeDetail','employee_id','employee_id');
	// }

	public function setStartDateAttribute($value)
	{
		$this->attributes['start_date'] = Carbon::createFromFormat(env('Date_Format'), $value)->format('Y-m-d');
	}

	public function getStartDateAttribute($value)
	{
		return Carbon::parse($value)->format(env('Date_Format'));
	}

	public function setEndDateAttribute($value)
	{
		$this->attributes['end_date'] = Carbon::createFromFormat(env('Date_Format'), $value)->format('Y-m-d');
	}

	public function getEndDateAttribute($value)
	{
		return Carbon::parse($value)->format(env('Date_Format'));
	}

	public function getCreatedAtAttribute($value)
	{
		return Carbon::parse($value)->format(env('Date_Format'). '-- H:i');
	}


}
