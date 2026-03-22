<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
            'products'=>$category->products,
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
        $category->products()->create($request->validated() );
        return redirect()
            ->route('products.index',['category' => $category,]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('products.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product,ProductRequest $request)
    {
        $product->update($request->validated());
        return redirect()->route('products.index',$product->category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
       $product->delete();
        return redirect()->route('products.index',$product->category());
    }
}
