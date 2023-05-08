<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\AttendanceController;

Route::middleware('auth')->group(function(){
    Route::get('/', [TopController::class,'index']);});

Route::middleware('auth')->group(function(){
    Route::get('/attendance', [AttendanceController::class,'attendance']);});

Route::post('/workingStart', [TopController::class,'workingStart']);
Route::post('/workingEnd', [TopController::class,'workingEnd']);
Route::post('/breakStart', [TopController::class,'breakStart']);
Route::post('/breakEnd', [TopController::class,'breakEnd']);
Route::post('/search', [AttendanceController::class,'search']);