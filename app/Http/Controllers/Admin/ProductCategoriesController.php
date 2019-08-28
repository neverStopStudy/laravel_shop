<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategorie;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index',
            ['categories' => ProductCategorie::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create',[
            'category' => [],
            'categories' => ProductCategorie::with('children')->where('parent_id','0')->get(),
            'delimeter' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = ProductCategorie::create($request->all());
        $category->setSlugAttribute();
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategorie  $productCategorie
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategorie $productCategorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategorie  $productCategorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProductCategorie::find($id);
        return view('admin.categories.edit', [
            'category' => $category,
            'categories' => ProductCategorie::with('children')->where('parent_id','0')->get(),
            'delimeter' => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategorie  $productCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $mycategory = $category;
        $mycategory = ProductCategorie::find($id);
//        dd($mycategory);
        $mycategory->fill($request->all());
        $mycategory->save();
//        $category->update($request->except('slug'));
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategorie  $productCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategorie::destroy($id);
        return redirect()->route('admin.category.index');
    }
}
