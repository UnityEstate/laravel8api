<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\ProductController;


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

Route::get('/', [CompanyController::class,'index']);

//http://localhost/laravel8API/public/api/staff

Route::get('/staff', function () {
    return 'Hello Staff';
});

//http://localhost/laravel8API/public/api/staff/2

Route::get('/staff/{id}', [CompanyController::class,'show']);

Route::apiResource('/product', ProductController::class);

Route::apiResource('/department', DepartmentController::class);
//ค้นหาชื่อแผนก
//api/search/department?name=บ

Route::get('/search/department', [DepartmentController::class,'search']);





