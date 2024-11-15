<?php

use Illuminate\Support\Facades\Route;

route::middleware('SetLang')->group(function(){

    Route::view('/', 'welcome')->name('signup');
    Route::view('/login', 'login')->name('login');
    Route::view('/forgetpassword', 'forgetpassword')->name('forgetpassword');
    // Route::view('/verifyOtp', 'verifyOtp')->name('otp_view');
    // Route::get('/resetPassword', 'resetPassword')->name('reset_password');
    
    Route::get('setlang/{lang}', function($lang){
        Session::put('lang', $lang);
        return redirect('/');
    });
    Route::get('/verifyOtp/{email}', function ($email) {
        return view('verifyOtp', compact('email'));
    })->name('otp_view');
    Route::get('/resetPassword/{email}', function ($email) {
        return view('resetPassword', compact('email'));
    })->name('reset_password');
});


