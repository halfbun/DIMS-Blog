<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            'slug' => 'required|unique:categories',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        //excerpt tidak butuh formatting text sebenarnya
        //maka digunakan strip_tags
        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'New Category has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('dashboard.categories.edit',[
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //buat rules dulu
        $rules = [
            'category_name' => 'required|max:255'
        ];

        //cek slugnya, jika slug baru berbeda dengan slug lama, slug baru harus unik
        if($request->slug != $category->slug){
            $rules['slug'] = 'required|unique:categories';
        }

        //validasi data
        $validatedData = $request->validate($rules);
        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success' , 'Category has beed deleted');
    }

    public function categorySlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->category_name);
        return response()->json(['slug' => $slug]);
    }    
}
