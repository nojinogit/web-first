<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\UserIndexController;
use App\Http\Controllers\UserAttendanceController;

Route::middleware('auth')->group(function(){
    Route::get('/', [IndexController::class,'index']);});

Route::middleware('auth')->group(function(){
    Route::get('/attendance', [AttendanceController::class,'attendance']);});

Route::middleware('auth')->group(function(){
    Route::get('/userIndex', [UserIndexController::class,'index']);});

Route::middleware('auth')->group(function(){
    Route::get('/userAttendance', [UserAttendanceController::class,'index']);});

Route::post('/workingStart', [IndexController::class,'workingStart']);
Route::post('/workingEnd', [IndexController::class,'workingEnd']);
Route::post('/breakStart', [IndexController::class,'breakStart']);
Route::post('/breakEnd', [IndexController::class,'breakEnd']);
Route::get('/search', [AttendanceController::class,'search']);
Route::get('/userSearch', [UserIndexController::class,'search']);
Route::get('/userAttendanceSearch', [UserAttendanceController::class,'search']);