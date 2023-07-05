<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productsArray = $this->product->with(['user', 'category'])->withoutGlobalScopes()->orderByDesc('id')->get();

        return  ProductResource::collection($productsArray);
    }

}
