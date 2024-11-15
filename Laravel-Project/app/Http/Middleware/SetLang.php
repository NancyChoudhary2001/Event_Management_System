<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::check()) {
        //     $user = Auth::user();
        //     $setting = $user->setting; // Assuming you have a relationship in the User model
            
        //     // If the language is set in the settings table, use it
        //     if ($setting && $setting->language) {
        //         $locale = $setting->language;
        //     } else {
        //         // Default to application's default language
        //         $locale = config('app.locale');
        //     }
        // } else {
        //     // If user is not logged in, check the session for language
        //     $locale = Session::get('locale', config('app.locale'));
        // }
        // App::setLocale($locale);
        if($request->session()->get('lang')){

        \App::setLocale($request->session()->get('lang'));
    
        }
        // dump(Session::get('lang'));
        // $request->merge(['session' => Session::get('lang')]);
        return $next($request);
    }
}
