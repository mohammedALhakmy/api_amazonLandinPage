<?php


use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DistrictsController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Support\Facades\Route;

//Route::apiResources([]);
//php artisan make:controller Api/CityController --invokable
## --------------   SETTING MODULE   --------------
Route::get('/settings',SettingController::class);


## --------------   CITY MODULE   --------------
Route::get('/city',CityController::class);


## --------------   Districts MODULE   --------------
//Route::get('/city/{city_id}',DistrictsController::class);
Route::get('/districts',DistrictsController::class);
