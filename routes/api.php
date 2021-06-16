<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [App\Http\Controllers\Auth\ApiLoginController::class, 'authenticate']);

$methods = ['index', 'edit', 'update' ,'store', 'destroy'];
Route::resource('contacts', \App\Http\Controllers\PhoneBook\ContactController::class)
    ->only($methods)
    ->middleware('auth:sanctum');

