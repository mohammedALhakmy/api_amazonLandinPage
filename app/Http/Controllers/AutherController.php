<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\AuthorRequest;
use App\Http\Requests\AuthorRequestUpdate;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AutherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::get();
        return Response::json(['data' => $authors], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function store(AuthorRequest $request)
    {
        $insert = $request->validated();
        $author = Author::create($insert);
        if ($author){
            return  ApiResponse::sendResponse(201,'Author Created Successfully',new AuthorResource($author));
        }
        return ApiResponse::sendResponse(500, "Author Not Created",[]);
    }

    public function show($id)
    {
        $authors = Author::find($id);
        if ($authors){
            return  ApiResponse::sendResponse(200,'Author Show Successfully',new AuthorResource($authors));
        }
        return ApiResponse::sendResponse(500, "Author Not Created",[]);
    }

    public function edit(Author $auther)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequestUpdate $request, $id)
    {
        $author = Author::find($id);
        if (!$author) {
            return ApiResponse::sendResponse(404, "Author Not Found", []);
        }
        $insert = $request->validated();
        $author->update($insert);

        return ApiResponse::sendResponse(200, 'Author Updated Successfully', new AuthorResource($author));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return ApiResponse::sendResponse(404, "Author Not Found", []);
        }
        $author->delete($author);

        return ApiResponse::sendResponse(200, 'Author Deleted Successfully', []);
    }

    public function search($search)
    {
        $authors = Author::where('author_name', 'like', '%' . $search . '%')->get();
        if ($authors){
            return ApiResponse::sendResponse(200, "Authors Fetched Successfully",AuthorResource::collection($authors));
        }
        return ApiResponse::sendResponse(200, "Authors Not Found",[]);
    }
}
