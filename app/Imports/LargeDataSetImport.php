<?php

namespace App\Imports;

// use App\Models\LargeDataSet;
// use Maatwebsite\Excel\Concerns\ToModel;

// class LargeDataSetImport implements ToModel
// {
//     /**
//     * @param array $row
//     *
//     * @return \Illuminate\Database\Eloquent\Model|null
//     */
//     public function model(array $row)
//     {
//         return new LargeDataSet([
//             //
//         ]);
//     }
// }

use App\Models\LargeDataset;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class LargeDataSetImport implements ToCollection, WithChunkReading
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            dd($row->toArray()); 
            LargeDataset::create([
                'branch_id' => intval($row['branch_id']), // Assuming 'branch_id' is a key in the $row array
                'firstName' => $row['first_name'],         // Assuming 'first_name' is a key in the $row array
                'lastName'  => $row['last_name'],          // Assuming 'last_name' is a key in the $row array
                'email'     => $row['email'],              // Assuming 'email' is a key in the $row array
                'phone'     => $row['phone'],              // Assuming 'phone' is a key in the $row array
                'gender'    => $row['gender'],             // Assuming 'gender' is a key in the $row array
            ]);
        }
    }
    public function chunkSize(): int
    {
        return 1000;
    }
}

