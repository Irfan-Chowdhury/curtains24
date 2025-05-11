<?php


namespace App\Http\Controllers\FrontEnd;


use App\Models\Old\CMS;

class ContactController {

	public function index()
	{
		$cms = CMS::find(1);
		$contact = $cms->contact;
		return view('admin.frontend.cms.contact',compact('contact'));
	}

}
