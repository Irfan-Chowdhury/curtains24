<?php

namespace App\Models\Old;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EmployeeQualificaiton extends Model
{
	protected $guarded=[];

	public function employee(){
		return $this->hasOne('App\Models\Old\Employee','id','employee_id');
	}

	public function EducationLevel(){
		return $this->hasOne('App\Models\Old\QualificationEducationLevel','id','education_level_id');
	}
	public function LanguageSkill(){
		return $this->hasOne('App\Models\Old\QualificationLanguage','id','language_skill_id');
	}
	public function GeneralSkill(){
		return $this->hasOne('App\Models\Old\QualificationSkill','id','general_skill_id');
	}

	public function setFromYearAttribute($value)
	{
		$this->attributes['from_year'] = Carbon::createFromFormat(env('Date_Format'), $value)->format('Y-m-d');
	}

	public function getFromYearAttribute($value)
	{
		return Carbon::parse($value)->format(env('Date_Format'));
	}

	public function setToYearAttribute($value)
	{
		$this->attributes['to_year'] = Carbon::createFromFormat(env('Date_Format'), $value)->format('Y-m-d');
	}

	public function getToYearAttribute($value)
	{
		return Carbon::parse($value)->format(env('Date_Format'));
	}
}
