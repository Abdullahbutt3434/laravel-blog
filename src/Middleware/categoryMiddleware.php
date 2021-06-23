<?php

namespace BinshopsBlog\Middleware;

use App\Models\User;
use Brian2694\Toastr\Toastr;
use Closure;
use BinshopsBlog\Models\BinshopsLanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class categoryMiddleware
{
    public function handle($request, Closure $next)
    {

        $user = User::where('email', $request->author_email)->get()->first();
        if (Auth::user()->id == 1) {
            return  $next($request);
        } else {
            return redirect()->back();
        }


        return $next($request);
    }
}

