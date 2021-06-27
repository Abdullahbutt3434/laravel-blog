<?php


namespace BinshopsBlog\Middleware;

use App\Models\User;
use Brian2694\Toastr\Toastr;
use Closure;
use BinshopsBlog\Models\BinshopsLanguage;
use Illuminate\Support\Facades\Session;

class commentWriterMiddleware
{
    public function handle($request, Closure $next)
    {
//        $lang = BinshopsLanguage::where('locale', $request->route('locale'))
//            ->where('active', true)
//            ->first();
//
//        if (!$lang){
//            return abort(404);
//        }

//        $request->attributes->add(['lang_id' => $lang->id, 'locale' => $lang->locale]);
        $user = User::where('email',Auth::user()->email)->get()->first();
//        dd(Auth::user()->email);
        if ($user == true ){
            if(Auth::guest()){
                return redirect()->route('login');
            }else{
                return $next($request);

            }
        }else{
            Session::flash('message', 'Sign Up to write Comment!');
            return  redirect()->route('register');
        }
//

    }
}
