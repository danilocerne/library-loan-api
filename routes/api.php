<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('register', [UserController::class, 'store']);
// Route::post('register', 'UserController@store');
// Route::resource('register', 'UserController');

// Route::get('welcome', function () {
//     return view('welcome');
// });
