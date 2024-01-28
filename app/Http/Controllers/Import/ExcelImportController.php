<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function importProductView(){
        return view('admin.product.import.index');
    }
    public function importProduct(Request $request){
        // Get the uploaded file
        $file = $request->file('file');

        // Process the Excel file
        Excel::import(new ExcelImport, $file);    
    
        return redirect()->back()->with('success', 'Excel file imported successfully!');
    }
}
