<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\AdduserController;
use App\Http\Controllers\AddbranchController;
use App\Http\Controllers\AddeventController;

Route::post('/signup',[UserController::class,'signup']);
Route::post('/login',[UserController::class,'login']);
Route::post('/forgetpassword',[UserController::class,'forgetpassword']);
Route::post('/verifyOtp',[UserController::class,'verifyOtp']);
Route::post('/resetPassword',[UserController::class,'resetPassword']);
Route::post('/savelanguage',[UserController::class,'savelanguage']);
Route::post('/adduser',[AdduserController::class,'adduser']);
Route::post('/addbranch',[AddbranchController::class,'addbranch']);
// Route::get('/getusers',[AdduserController::class, 'getUser'])->name('getuser');
// Route::get('/getbranches',[AddbranchController::class, 'getBranch'])->name('getbranch');
Route::post('/addevent',[AddeventController::class, 'addevent']);