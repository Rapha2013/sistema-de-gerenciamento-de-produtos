<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\CadastroCategoriaRequest;
use App\Http\Requests\EdicaoCategoriaRequest;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoryArray = $this->category->orderByDesc('id')->get();

        return view('category.index', ['categories' => $categoryArray]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastroCategoriaRequest $request)
    {
        $category = new Category($request->all());
        $category->save();

        return redirect()
            ->route('categories.index')
            ->with('sucesso', 'Categoria criada com sucesso!');
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
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EdicaoCategoriaRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect()->back()->with('sucesso', 'Categoria editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        if(Product::where('category_id', $category->id)->exists()) {
            return redirect()->back()->with('erro', 'Desculpe, não é possível excluir esta categoria no momento. Existem produtos associados a ela!');
        }

        $category->delete();

        return redirect()->back()->with('sucesso', 'Categoria deletada com sucesso!');
    }
}
