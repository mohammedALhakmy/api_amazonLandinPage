<?php


use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DistrictsController;
use App\Http\Controllers\Api\DomainContoller;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\UplaodImagecontroller;
use App\Http\Controllers\AutherController;
use Illuminate\Support\Facades\Route;

//Route::apiResources([]);
//php artisan make:controller Api/CityController --invokable
## --------------   AUTH MODULE   --------------
Route::controller(AuthController::class)->group(function () {

    Route::post('register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
    Route::post('/refresh', 'refresh');
});

## --------------   SETTING MODULE   --------------
Route::get('/settings',SettingController::class);


## --------------   CITY MODULE   --------------
Route::get('/city',CityController::class);


## --------------   Districts MODULE   --------------
//Route::get('/city/{city_id}',DistrictsController::class);
Route::get('/districts',DistrictsController::class);

## --------------   Message MODULE   --------------
//Route::get('/city/{city_id}',DistrictsController::class);
Route::post('/message',MessageController::class);


## --------------   Message MODULE   --------------
//Route::get('/city/{city_id}',DistrictsController::class);
Route::get('/domain',DomainContoller::class);


## ----------- ADS MODULE ------------
Route::prefix('ads')->controller(AdController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/latest', 'latest');
    Route::get('/latest/{domain_id}', 'domain');
    Route::get('search','search');

    // User Ads endpoints
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('create', 'create');
        Route::post('update/{id}', 'update');
        Route::get('delete/{id}', 'delete');
        Route::get('myApps', 'myApps');
    });
});

Route::post('/registerPassport',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);


Route::middleware('auth:sanctum')->controller(UplaodImagecontroller::class)->prefix("upload")->group(function () {
    Route::get('/','index');
    Route::post('/store','store');
});


Route::get('author/search/{search}', [AutherController::class, 'search']);
Route::apiResource('author', AutherController::class);


Route::get('login2', [AuthController::class, 'login2']);
