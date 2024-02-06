<?php

namespace App\Http\Controllers;

use App\Imports\LargeDataSetImport;
use App\Jobs\ProccessLargeDatasetImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class LargeDatasetController extends Controller
{
    public function index(){
        return view('admin.largedataset.index');
    }
    public function create(){
        return view('admin.largedataset.create');

    }

    public function store(Request $request){
         
         $file = $request->file('file');
          //$collection = Excel::toCollection(new LargeDataSetImport,$file );
        //  $collection = Excel::import(new LargeDataSetImport,$file );
        //  dd($collection);
        $filePath = Storage::putFile('uploads', $file);
        ProccessLargeDatasetImport::dispatch( $filePath);
         return redirect()->route('largedataset.index')->with('success', 'Product import process started!');


        
    }
}
