<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return 'tenant';
})->name('tenant');