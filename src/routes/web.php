<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\AttendanceController;

Route::middleware('auth')->group(function(){
    Route::get('/', [TopController::class,'index']);});



Route::get('/attendance', [AttendanceController::class,'attendance']);