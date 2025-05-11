<?php

namespace App\Models\Old;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FinanceDeposit extends Model
{
	protected $fillable = [
		'id','company_id','account_id','amount','deposit_category_id','description','payment_method_id','payer_id',
		'deposit_reference','deposit_date','deposit_file'
	];

	public function company(){
		return $this->hasOne('App\Models\Old\company','id','company_id');
	}

	public function Account(){
		return $this->hasOne('App\Models\Old\FinanceBankCash','id','account_id');
	}

	public function PaymentMethod(){
		return $this->hasOne('App\Models\Old\PaymentMethod','id','payment_method_id');
	}

	public function Payer(){
		return $this->hasOne('App\Models\Old\FinancePayers','id','payer_id');
	}

	public function setDepositDateAttribute($value)
	{
		$this->attributes['deposit_date'] = Carbon::createFromFormat(env('Date_Format'), $value)->format('Y-m-d');
	}

	public function getDepositDateAttribute($value)
	{
		return Carbon::parse($value)->format(env('Date_Format'));
	}


	public function depositCategory(){
		return $this->belongsTo(DepositCategory::class,'deposit_category_id');
	}

}

