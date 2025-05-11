<?php

namespace App\Models\Old;


use Illuminate\Database\Eloquent\Model;

class EmployeeProject extends Model
{
    //
	protected $table= "employee_project";

	public function assignedProjects(){
		return $this->hasMany(Project::class,'id','project_id');
	}
}
