<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Create and return a new instance of YourModel with the data from the row
        return new Product([
            'category_id' => $row['category_id'], // Assuming 'column1' is the header in your Excel file
            'name' => $row['name'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],  // Assuming 'column2' is the header in your Excel file
            // Add more columns as needed
        ]);
    }
}
