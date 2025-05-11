<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if(!auth()->check()){
            return abort('403', __('You are not authorized'));
        }


        return redirect("/");
    }
}
