<?php

namespace App\Http\Controllers;

use function auth;

class RouteClosureHandlerController extends Controller {

	//
	public function redirectToLogin()
	{
		return redirect('login');
	}

	public function markAsReadNotification()
	{
		auth()->user()->unreadNotifications->markAsRead();
	}

	public function allNotifications()
	{
		$all_notification = auth()->user()->notifications()->get();
		if(auth()->user()->role_users_id == 3)
		{
			return view('admin.shared.client_all_notifications', compact('all_notification'));
		}
		return view('admin.shared.all_notifications', compact('all_notification'));
	}

	public function clearAll()
	{
		auth()->user()->notifications()->delete();
		return redirect()->back();
	}


	public function help()
	{
		return view('admin.help.index');
	}
}
