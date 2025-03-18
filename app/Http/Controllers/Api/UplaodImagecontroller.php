<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Http\Resources\ImageUploadedResource;
use App\Models\UplaodImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UplaodImagecontroller extends Controller
{



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'image' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'photo' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
        ],[],[
            'image' => 'image',
            'photo' => 'photo',
        ]);

        if ($validator->fails()) {
//            return ApiResponse::sendResponse(422, "Uploaded Validation Errors", $validator->messages()->all());
            return ApiResponse::sendResponse(422, "Uploaded Validation Errors", $validator->errors());
        }
        $paths = [];
        $paths['user_id'] = $request->user()->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_image.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $paths['image'] = 'images/' . $imageName;
        }
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_photo.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $photoName);
            $paths['photo'] = 'images/' . $photoName;
        }
        $uploadedImage = UplaodImage::create([
            'image' => $paths['image'] ?? null,
            'photo' => $paths['photo'] ?? null,
            'user_id' => $paths['user_id'] ?? null
        ]);
        return ApiResponse::sendResponse(201, "Uploaded Images Successfully",new ImageUploadedResource($uploadedImage));
    }


}
