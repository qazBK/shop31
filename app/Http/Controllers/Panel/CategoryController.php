<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.index',[
            'categories'=> Category::all(),
            //'categories'=> Category::query()->get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::query()->create($request->validated());
        return redirect()
            ->route('admin-panel')
            -> withInput($request->validated());
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
    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category, CategoryRequest $request)
    {
        $category->update($request->validated());
        return redirect()
            -> route('admin-panel');
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(string $id)
    //{
    //dd($id);
    //}

    public function destroy(Category $category)
    {
        $category-> delete();
        return redirect()
            -> route('admin-panel');
    }
}
