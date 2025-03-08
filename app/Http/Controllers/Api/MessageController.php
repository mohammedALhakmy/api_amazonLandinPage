<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(MessageRequest $request)
    {
        $data = $request->validated();
        $message = Message::create($data);
        if ($message) {
            return ApiResponse::sendResponse(201, 'Message Sent Successfully', []);
        }
        return ApiResponse::sendResponse(500, 'Message Not Sent', []);
    }
}
