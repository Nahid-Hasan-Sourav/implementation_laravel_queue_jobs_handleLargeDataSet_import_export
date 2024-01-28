<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductValidation;
use App\Jobs\sendMailTousersJob;
use App\Mail\SendMailToUsers;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with(['category'])->get();
        return view('admin.product.index',compact('product'));
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
        
        $allUsers = User::where('role', 1)->get();
      
        $product = new Product();
        $product->category_id = $validatedData['category_id'];
        $product->name        = $validatedData['product_name'];
        $product->price       = $validatedData['product_price'];
        $product->quantity    = $validatedData['product_quantity'];

        $product->save();

        // $job = (new \App\Jobs\sendMailTousersJob($product))
        // ->delay(now()->addSeconds(2));

        // foreach($allUsers as $user){
            // Mail::to($user->email)->send(new SendMailToUsers($product,$user));
            sendMailTousersJob::dispatch($product);
            // dispatch($job);
        // }
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
        $product  = Product::with(['category'])->find($id);
        $category = Category::all();

        return view('admin.product.edit',compact('category','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $data = Product::find($id);

        $data->category_id   = $request->category_id;
        $data->name          = $request->product_name;
        $data->price         = $request->product_price;
        $data->quantity      = $request->product_quantity;

        $data->save();
        return redirect()->route('product.index')->with('message','product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);
        $data->delete();
        return back()->with('message','product deleted successfully');

    }
}
