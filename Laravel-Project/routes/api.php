<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

Route::post('/signup',[UserController::class,'signup']);
Route::post('/login',[UserController::class,'login']);
Route::post('/forgetpassword',[UserController::class,'forgetpassword']);
Route::post('/verifyOtp',[UserController::class,'verifyOtp']);
Route::post('/resetPassword',[UserController::class,'resetPassword']);
Route::post('/savelanguage',[UserController::class,'savelanguage']);