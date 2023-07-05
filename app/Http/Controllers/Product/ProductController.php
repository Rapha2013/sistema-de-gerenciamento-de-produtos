<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroProdutoRequest;
use App\Http\Requests\EdicaoProdutoRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $productsArray = $this->product->with(['user', 'category'])->orderByDesc('id')->get();

        return view('products.index', ['products' => $productsArray]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastroProdutoRequest $request)
    {
        $product = new Product($request->all());
        $product->category()->associate($request->category_id);
        $product->user()->associate(Auth()->user()->id);
        $product->save();

        return redirect()
            ->route('products.index')
            ->with('sucesso', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EdicaoProdutoRequest $request, Product $product)
    {

        $product->fill($request->all());
        $product->category()->associate($request->category_id);
        $product->save();

        return redirect()->back()->with('sucesso', 'Produto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('sucesso', 'Produto deletado com sucesso!');
    }
}
