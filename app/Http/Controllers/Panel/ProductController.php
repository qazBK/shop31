<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        //$category->products()->get();
        return view('products.index',[
           'category' =>$category,
            'products'=>$category->products()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        return view('products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Category $category,ProductRequest $request)
    {
        //return 1;
        $product = $category->products()->create($request->validated());
        $product->updateImages($request->file('images'));
        return redirect()
            ->route('categories.products.index',['category' => $category,]);
    }

    // Временно отключите валидацию - замените в контроллере:


    /**
     * Display the specified resource.
     */
    public function show(/*Category $category,*/Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, Product $product)
    {
        //return $category;
        //return $product;
        return view('products.edit', [
            'product' => $product,  // Убираем compact()
            'category' => $category, // Убираем compact()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category,Product $product,ProductRequest $request)
    {
        $product->update($request->validated());
        $product->updateImages($request->file('images'));
        return redirect()->route('categories.products.index',['category' => $category,]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category,Product $product)
    {
       $product->delete();
        return redirect()->route('categories.products.index',['category' => $category,]);
    }

    public function list(): Factory|View
    {
        return view('products.list',[
            'products'=>Product::query()->orderBy('id','DESC')->paginate(5)
        ]);
    }
}
