<?php

namespace App\Http\Controllers\Visitor;


class HomeController
{

	public function index()
	{
		return view('visitor.pages.index');
	}

    public function termsAndCondition()
    {
        return view('visitor.pages.terms-and-condition');
    }

    public function privacyPolicy()
    {
        return view('visitor.pages.privacy-policy');
    }
}
