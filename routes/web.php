<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });



Route::group(['namespace' => 'Web', 'as' => 'web.'], function () {

    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('cliente/cadastro', [RegisterController::class, 'register'])->name('cadastro');
});

Auth::routes();