<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\DomainResource;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainContoller extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $domain = Domain::all();
        if ($domain) {
            return ApiResponse::sendResponse(200, 'Domain Retrieved Successfully', DomainResource::collection($domain));
        }

        return ApiResponse::sendResponse(404, 'Domain Not Found',[]);
    }
}
