<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\Response;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('admin/product/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view('admin/product/add', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $request->category_id; // arrays of role ids
        $products = new Products;
        $products->product_name = $request->product_name;
        $products->price = $request->price;
        $products->stock = $request->stock;
        $products->weight = $request->weight;
        $products->description = $request->description;
        $products->product_rate = '0';
        $products->save();
        $products->category()->attach($category);

        $idproduct = Products::orderBy('id', 'desc')->first()->id;

        if ($idproduct) {
            $files = [];
            foreach ($request->file('files') as $file) {
                if ($file->isValid()) {
                    $nama_image = md5(now() . "_") . $file->getClientOriginalName();
                    $file->storeAs("img/products_image", $nama_image);
                    $files[] = [
                        'product_id' => $idproduct,
                        'image_name' => $nama_image,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
            ProductImage::insert($files);
        }
        return redirect(Route('product'))->with('success', 'Berhasil menambahkan Product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        $responses = Response::all();
        return view('/admin/product/show', compact('product', 'responses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        $categorys = Category::all();
        return view('admin/product/edit', compact('categorys', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        $category = $request->category_id; // arrays of role ids
        Products::find($product->id)->category()->sync($category);

        $products = $request->except(['category_id']); // pengecualian request
        $product->update($products);
        return redirect(Route('product'))->with('info', 'Product Telah Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->category()->detach();
        foreach ($product->product_image as $image) {
            Storage::delete('img/products_image/' . $image->image_name);
        }
        ProductImage::where('product_id', $product->id)->delete();

        $product->delete();
        return redirect(Route('product'))->with('error', 'Data Telah Dihapus');
    }
}
