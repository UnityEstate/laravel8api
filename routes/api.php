<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//http://localhost/laravel8API/public/api/

Route::get('/', function () {
    return config('app.url') . 'Dat' . now();
});

//http://localhost/laravel8API/public/api/staff

Route::get('/staff', function () {
    return 'Hello Staff';
});

//http://localhost/laravel8API/public/api/staff/2

Route::get('/staff/{id}', function ($id) {
    return 'Hello Staff id' . $id;
});




