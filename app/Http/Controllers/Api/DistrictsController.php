<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictsResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
//    public function __invoke(Request $request,$city_id)
    {
//        $district = District::where('city_id', $city_id)->get();
        $district = District::where('city_id', $request->input('city'))->get();
        if ($district){
            return ApiResponse::sendResponse(200, 'District Retrieved Successfully', DistrictsResource::collection($district));
        }
        return ApiResponse::sendResponse(200, 'District Not Found',[]);
    }
}
