<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $id)
    {
        return Inertia::render('product',[
            'product' => Product::find($id)
        ]);
    }

}
