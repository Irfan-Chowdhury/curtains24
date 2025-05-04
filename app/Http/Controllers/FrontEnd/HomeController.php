<?php


namespace App\Http\Controllers\FrontEnd;


use App\Models\CMS;

class HomeController {

	public function index()
	{
		$cms = CMS::find(1);
		$home = $cms->home;
		return view('admin.frontend.cms.home',compact('home'));
	}
}
