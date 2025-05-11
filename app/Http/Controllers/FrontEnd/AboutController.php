<?php


namespace App\Http\Controllers\FrontEnd;


use App\Models\Old\CMS;

class AboutController {

	public function index()
	{
		$cms = CMS::find(1);
		$about = $cms->about;
		return view('admin.frontend.cms.about',compact('about'));
	}
}
