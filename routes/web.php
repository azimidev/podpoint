<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', 'SpaController@index')->where('any', '.*');

// Route::get('/', function () {
//     return view('welcome');
// });
