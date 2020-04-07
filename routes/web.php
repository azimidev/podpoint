<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Note
|--------------------------------------------------------------------------
|
| If you would like to see the API routes, please go to api.php file.
| This is web routes, which is only one for SPA and because our app
| is build with Vue SPA, then we do not need to modify this file.
|
*/

Route::get('/{any}', 'SpaController@index')->where('any', '.*');

