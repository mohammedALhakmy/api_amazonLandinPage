<?php


use App\Http\Controllers\Api\SettingController;
use Illuminate\Support\Facades\Route;

//Route::apiResources([]);


Route::get('/settings',SettingController::class);
