<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdduserController;
use App\Http\Controllers\AddbranchController;
use App\Http\Controllers\AddeventController;
use App\Http\Controllers\EditprofileController;
use App\Http\Middleware\ValidUser;

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



// Route::get('index', function(){
//     return response()->json([
//         'file_exists' => file_exists(resource_path('views/admin/index.blade.php')),
//         'path' => resource_path('views/admin/index.blade.php'),
//     ]);
// });

Route::get('index', function () {
    return view('admin.index'); // Update from 'footer' to 'index'
})->name('index')->middleware(ValidUser::class);

// Route::get('addUser' , function(){
//     return view('admin.add-user');
// });
// In routes/web.php
Route::get('/addUser', [AdduserController::class, 'getCountries'])->name('addUser');
Route::post('/addUser', [AdduserController::class, 'adduser'])->name('addUser');
Route::get('/states/{country_id}', [AdduserController::class, 'getStates'])->name('getStates');
Route::get('/cities/{state_id}', [AdduserController::class, 'getCities'])->name('getCities');
Route::get('/branches/{city_id}', [AdduserController::class, 'getBranches']);
// Route::get('/addBranch', function(){
//     return view('admin.add-branch');
// })->name('addBranch');
Route::get('/getusers',[AdduserController::class, 'getUser'])->name('getuser');
Route::get('/users',[AdduserController::class, 'index'])->name('indexx');
Route::delete('/users/delete', [AdduserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/edit/{email}', [AdduserController::class, 'edit'])->name('editUserByEmail');
Route::post('/users/update', [AdduserController::class, 'update'])->name('updateUser');

Route::get('/branches',function(){
    return view('admin.branch');
})->name('branch');
Route::get('/addBranch',[AddbranchController::class,'getCountries'])->name('addBranch');
Route::get('/getbranches',[AddbranchController::class, 'getBranch'])->name('getbranch');
Route::get('/newbranches',[AddbranchController::class, 'newbranch'])->name('branch');

// Route::delete('/branch/delete/{name}', [BranchController::class, 'destroyByName'])->name('branch.destroyByName');
Route::delete('/branches/delete/{name}', [AddbranchController::class, 'destroyByName'])->name('branches.destroyByName');
Route::get('/branches/edit/{name}', [AddbranchController::class, 'editBranch'])->name('branches.edit');
Route::put('/branches/update/{name}', [AddbranchController::class, 'updateBranch'])->name('branches.update');
Route::get('/states/{countryId}', [AddbranchController::class, 'getStates'])->name('getStates');
Route::get('/cities/{stateId}', [AddbranchController::class, 'getCities'])->name('getCities');

//Event Routes
Route::get('/events', function(){
    return view('admin.events');
})->name('events');

// Route::get('/addevent', function(){
//     return view('admin.add-event');
// })->name('addevent');

Route::get('/addevent', [AddeventController::class, 'getCountries'])->name('addevent');
Route::get('/getevents',[AddeventController::class,'getEvents'])->name('getevent');
Route::get('/events/edit/{id}', [AddeventController::class, 'edit'])->name('events.edit');
Route::delete('/events/delete/{id}', [AddeventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/edit/{name}', [AddeventController::class, 'edit'])->name('events.edit');
Route::put('/events/update/{name}', [AddeventController::class, 'update'])->name('events.update');
Route::get('profile', function(){
    return view('admin.profile');
})->name('profile');
Route::put('/profile/{user_id}', [EditprofileController::class, 'update'])->name('profile.update');

Route::get('/profile/{user_id}', [EditprofileController::class, 'edit'])->name('profile.edit');



