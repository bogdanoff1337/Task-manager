<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/auth/google', [LoginController::class, 'redirectToProvider']);
Route::get('/auth/google/call-back', [LoginController::class, 'handleGoogleCallback']);
Route::get('/auth/google/logout', [LoginController::class, 'logout']);
Route::get('/api/getUserName', [LoginController::class, 'getUserName']);
Route::post('/api/tasks', [TaskController::class, 'store']);

Route::get('{any?}', fn () => view('app'))->where('any', '.*');