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
        foreach ($rows as $key => $row) 
        {
            if($key != 0){
                LargeDataset::create([
                    'branch_id' => intval($row[1]),
                    'first_name'  => $row[2],
                    'last_name'   => $row[3],
                    'email'      => $row[4],
                    'phone'      => $row[5],
                    'gender'     => $row[6]
                   
                ]);
            }
        }
    }
    public function chunkSize(): int
    {
        return 1000;
    }
}

