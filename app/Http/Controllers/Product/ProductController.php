<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductValidation;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductValidation $request)
    {

        $validatedData = $request->validated();
        // dd($request->all());
        $product = new Product();
        $product->category_id = $validatedData['category_id'];
        $product->name        = $validatedData['product_name'];
        $product->price       = $validatedData['product_price'];
        $product->quantity    = $validatedData['product_quantity'];

        $product->save();
        return redirect()->route('product.index')->with('message','product added successfully');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
