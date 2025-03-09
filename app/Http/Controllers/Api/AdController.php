<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdResource;
use App\Models\Ads;
use Illuminate\Http\Request;

class AdController extends Controller
{

    public function index()
    {
        $ads = Ads::latest()->paginate(1);
        if ($ads->isNotEmpty()) {
            if ($ads->total() > $ads->perPage()) {
                $data = [
                    'records' => AdResource::collection($ads),
                    'pagination links' => [
                        'current page' => $ads->currentPage(),
                        'per page' => $ads->perPage(),
                        'total' => $ads->total(),
                        'links' => [
                            'first' => $ads->url(1),
                            'last' => $ads->url($ads->lastPage()),
                            'prev' => $ads->previousPageUrl(),
                            'next' => $ads->nextPageUrl(),
                        ]
                    ]
                ];
            }else{
                $data = AdResource::collection($ads);
            }
            return ApiResponse::sendResponse(200, "Ads Fetched Successfully",$data);
        }
        return ApiResponse::sendResponse(200, "Ads Not Found",[]);
    }

    public function latest()
    {
        $ads = Ads::latest()->take(10)->get();
        if (count($ads) > 0){
            return ApiResponse::sendResponse(200, "Latest Ads Fetched Successfully",AdResource::collection($ads));
        }
        return ApiResponse::sendResponse(200, "Ads Not Found",[]);
    }

    public function domain($domain_id)
    {
        $ads = Ads::where('domain_id', $domain_id)->latest()->get();
        if ($ads){
            return ApiResponse::sendResponse(200, "Ads in the Domain Fetched Successfully",AdResource::collection($ads));
        }
        return ApiResponse::sendResponse(200, "Ads Domain Not Found",[]);
    }
}
