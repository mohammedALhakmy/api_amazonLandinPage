<?php


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DistrictsController;
use App\Http\Controllers\Api\DomainContoller;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Support\Facades\Route;

//Route::apiResources([]);
//php artisan make:controller Api/CityController --invokable
## --------------   AUTH MODULE   --------------
Route::controller(AuthController::class)->group(function () {

    Route::post('register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
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
