<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nama" => 'required|min:3|unique:categories',
        ]);
        Categories::create($validated);
        session()->flash('success', 'Data added successfully!');
        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $category = Categories::where('slug', $slug)->first();
        return view('admin.categories.form', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $category = Categories::where('slug', $slug)->first();
        $validated = $request->validate([
            "nama" => 'required|min:3|unique:categories,nama,' . $category->id,
        ]);
        $category->update($validated);
        session()->flash('success', 'Data successfully changed!');
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categories::destroy($id);
        session()->flash('success', 'Data deleted successfully!');
        return redirect('/admin/categories');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Categories::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
