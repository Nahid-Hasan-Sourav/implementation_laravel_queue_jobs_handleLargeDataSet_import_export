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
            LargeDataset::create([
                'branch_id' => intval($row[0]),
                'firstName'  => $row[0],
                'lastName'   => $row[1],
                'email'      => $row[2],
                'phone'      => $row[3],
                'gender'     => $row[4],
               
            ]);
        }
    }
    public function chunkSize(): int
    {
        return 1000;
    }
}

