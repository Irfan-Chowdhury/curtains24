<?php

namespace App\Models\Old;

use Illuminate\Database\Eloquent\Model;

class AssetCategory extends Model
{
	protected $fillable = [
		'category_name','company_id'
	];

	public function company(){
		return $this->hasOne('App\Models\Old\company','id','company_id');
	}
}
