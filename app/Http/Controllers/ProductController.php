<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Outlet;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
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
        return view('dashboard.products.index', [
            'products' => Product::paginate(10),
            'outlets' => Outlet::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create', [
            'categories' => Category::all(),
            'outlets' => Outlet::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {         
        $validateData = $request->validate([
            'name' => 'required|max:255|unique:products',
            'category_id' => 'required',
            'outlet_id' => 'required',
            'harga' => 'required|integer',
            'stock' => 'required|integer',
            'photo_1' => 'image|file|max:3072|required', //3mb max
            'photo_2' => 'image|file|max:3072',
            'photo_3' => 'image|file|max:3072', 
            'description' => 'required'
        ]);

        if ($request->file('photo_1')) {
            $validateData['photo_1'] = $request->file('photo_1')->store('product-images');
        }
        if ($request->file('photo_2')) {
            $validateData['photo_2'] = $request->file('photo_2')->store('product-images');
        }
        if ($request->file('photo_3')) {
            $validateData['photo_3'] = $request->file('photo_3')->store('product-images');
        }

        Product::create($validateData);

        return redirect('/dashboard/products')->with('success', 'New Product has been added!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.products.show', [
            'product' => $product,
            'outlets' => Outlet::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'outlets' => Outlet::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $rules = [
            'category_id' => 'required',
            'outlet_id' => 'required',
            'harga' => 'required|integer',
            'stock' => 'required|integer',
            'photo_1' => 'image|file|max:3072', //3mb max
            'photo_2' => 'image|file|max:3072',
            'photo_3' => 'image|file|max:3072', 
            'description' => 'required',
        ];

        if ($request->name != $product->name) {
            $rules['name'] = 'required|max:255|unique:products';
        }

        $validateData = $request->validate($rules);
        
        $photos = ['photo_1', 'photo_2', 'photo_3'];

        foreach ($photos as $photo) {
            if ($request->file($photo)) {
                if ($request->{"oldImage" . substr($photo, -1)}) {
                    Storage::delete($request->{"oldImage" . substr($photo, -1)});
                }
                $validateData[$photo] = $request->file($photo)->store('product-images');
            }
        }


        Product::where('id', $product->id)
                ->update($validateData);

        return redirect('/dashboard/products')->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->photo_1) {
            Storage::delete($product->photo_1);
        }
        if ($product->photo_2) {
            Storage::delete($product->photo_2);
        }
        if ($product->photo_3) {
            Storage::delete($product->photo_3);
        }

        Product::destroy($product->id);
        return redirect('/dashboard/products')->with('success', 'Product has been deleted!');
        
    }
}