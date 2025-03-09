<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdRequest;
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

    public function search(Request $request)
    {
        $word = $request->has('search') ? $request->search : null;
        $ads = Ads::when($word != null, function ($query) use ($word) {
            $query->where('title', 'like', '%' . $word . '%');
        })->latest()->get();
        if ($ads) {
            return ApiResponse::sendResponse(200, "Ads Fetched Successfully",AdResource::collection($ads));
        }
        return ApiResponse::sendResponse(200, "Ads Not Found",[]);
    }

    public function create(AdRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $record = Ads::create($data);
        if ($record) {
            return ApiResponse::sendResponse(201, "Ad Created Successfully",new AdResource($record));
        }
        return ApiResponse::sendResponse(500, "Ad Not Created",[]);
    }

    public function update(AdRequest $request,$id)
    {
        $ad = Ads::find($id);
        if ($ad->user_id != $request->user()->id) {
            return ApiResponse::sendResponse(403, "You Can't Update this Ad",[]);
        }
        $data = $request->validated();
        $record = $ad->update($data);
        if ($record) {
            return ApiResponse::sendResponse(201, "Ad Updated Successfully",new AdResource($ad));
        }
        return ApiResponse::sendResponse(500, "Ad Not Updated",[]);
    }


    public function delete(Request $request,$id)
    {
        $ad = Ads::find($id);
        if (!$ad) {
            return ApiResponse::sendResponse(404, "Ad Not Found",[]);
        }
        if ($ad->user_id != $request->user()->id) {
            return ApiResponse::sendResponse(403, "You Can't Delete this Ad",[]);
        }
        $record = $ad->delete();
        if ($record) {
            return ApiResponse::sendResponse(201, "Ad Deleted Successfully",[]);
        }
        return ApiResponse::sendResponse(500, "Ad Not Deleted",[]);
    }

    public function myApps(Request $request)
    {
        $ads = Ads::where('user_id', $request->user()->id)->latest()->get();
        if ($ads) {
            return ApiResponse::sendResponse(200, "Ads Fetched Successfully",AdResource::collection($ads));
        }
        return ApiResponse::sendResponse(200, "Ads Not Found",[]);
    }
}
