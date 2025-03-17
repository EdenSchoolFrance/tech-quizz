<?php

use Illuminate\Support\Facades\Route;

ini_set('display_errors', 1);

Route::get('/', function () {
    return view('welcome');
});

