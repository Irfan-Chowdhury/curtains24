<?php

namespace App\Models\Old;


use Illuminate\Database\Eloquent\Model;

class FileManager extends Model
{
	protected $fillable = [
		'department_id','added_by','file_name','file_size','file_extension','external_link'
	];

	public function department(){
		return $this->hasOne('App\Models\Old\department','id','department_id');
	}

	public function AddedBy(){
		return $this->hasOne('App\Models\User','id','added_by');
	}
}
