<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __invoke(Request $request)
    {
        //$setting = Setting::findOrFail(1);
//        return new SettingResource($setting);
//        $setting = Setting::get();
//        return SettingResource::collection($setting);

        $setting = Setting::find(1);
        if ($setting) {
            return ApiResponse::sendResponse(200, 'Setting Retrieved Successfully', new SettingResource($setting));
        }
        return ApiResponse::sendResponse(200, 'Setting Not Found',[]);
    }
}
