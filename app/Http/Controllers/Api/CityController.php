<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $city = City::get();
        if ($city){
            return ApiResponse::sendResponse(200, 'City Retrieved Successfully', CityResource::collection($city));
        }
        return ApiResponse::sendResponse(200, 'City Not Found',[]);
    }
}
