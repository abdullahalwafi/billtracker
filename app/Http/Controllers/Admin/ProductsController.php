<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\Categories;
use App\Models\ImgProducts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::with(['categories'])->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.products.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'imgproducts.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validateproduct = $request->validate([
            "slug" => 'required|unique:products',
            "nama" => 'required|min:3',
            "harga_beli" => 'required|numeric',
            "harga_jual" => 'required|numeric',
            "stok" => 'required|numeric',
            "deskripsi" => 'required',
            "categories_id" => 'required',
        ]);

        if ($request->file('imgproducts')) {
            $product = Products::create($validateproduct);

            foreach ($request->file('imgproducts') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads/imgproducts', $filename);
                $img = new ImgProducts();
                $img->img = $filename;
                $img->products_id = $product->id; // Menyimpan products_id yang terkait
                $img->save();
            }
        }
        session()->flash('success', 'Data added successfully!');
        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $product = Products::where('slug', $slug)->first();
        $categories = Categories::all();
        return view('admin.products.form', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $product = Products::where('slug', $slug)->first();
        $validateproduct = $request->validate([
            "slug" => 'required|unique:products,slug,' . $product->id,
            "nama" => 'required|min:3',
            "harga_beli" => 'required|numeric',
            "harga_jual" => 'required|numeric',
            "stok" => 'required|numeric',
            "deskripsi" => 'required',
            "categories_id" => 'required',
        ]);

        if ($request->file('imgproducts')) {
            $imgproduct = Imgproducts::where('products_id', $product->id)->get();
            foreach ($imgproduct as $image) {
                unlink(storage_path('app/public/uploads/imgproducts/' . $image->img));
                $image->delete();
            }
            foreach ($request->file('imgproducts') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads/imgproducts', $filename);
                $img = new ImgProducts();
                $img->img = $filename;
                $img->products_id = $product->id;
                $img->save();
            }
        }
        $product->update($validateproduct);
        session()->flash('success', 'Data updated successfully!');
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imgproduct = Imgproducts::where('products_id', $id)->get();
        // dd($imgproduct);
        foreach ($imgproduct as $image) {
            unlink(storage_path('app/public/uploads/imgproducts/' . $image->img));
            $image->delete();
        }
        Products::destroy($id);
        session()->flash('success', 'Data deleted successfully!');
        return redirect('/admin/products');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Products::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
