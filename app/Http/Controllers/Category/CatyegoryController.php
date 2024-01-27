<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryValidation;
use App\Models\Category;
use Illuminate\Http\Request;

class CatyegoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function store(CategoryValidation $request){
        $validatedData = $request->validated();

        $category = new Category();
        $category->name = $validatedData['categoryName'];
        $category->save();

        return response()->json([
            "status"=>"success",
        ],200);
    }

    public function getAllCategory(){
        $allCategory = Category::all();

        return response()->json([
            "status"=>"success",
             "allCategory" => $allCategory

        ]);
    }

    //this is model binding
    public function editCategory(Category $category){
        return response()->json([
            "status"=>"success",
             "category" => $category

        ]);
    }

    public function updateCategory(Request $request, Category $category){
        $category->name = $request->categoryName;
        $category->save();

        return response()->json([
            "status"=>"success",
        ]);

    }

    public function destroyCategory(Category $category){

        $category->delete();

        return response()->json([
            "status"=>"success",
        ]);

    }
}
