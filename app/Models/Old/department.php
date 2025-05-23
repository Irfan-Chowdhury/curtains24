<?php

namespace App\Models\Old;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;

	protected $fillable = [
		'department_name', 'company_id','department_head','is_active',
	];

	public function company(){
		return $this->hasOne('App\Models\Old\company','id','company_id');
	}

	public function DepartmentHead(){
		return $this->hasOne('App\Models\Old\Employee','id','department_head');
	}


    public function employees(){
		return $this->hasMany(Employee::class,'company_id')->orderBy("id", "ASC");
	}


}
