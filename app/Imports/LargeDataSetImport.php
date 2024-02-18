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
                    'first_name'  => $row[1],
                    'last_name'   => $row[2],
                    'email'      => $row[3],
                    'phone'      => $row[4],
                    'gender'     => $row[5]

                ]);
        // foreach ($rows as $row) 
        // {
        //     LargeDataset::create([
        //         'branch_id' => intval($row[0]),
        //         'first_name'  => $row[0],
        //         'last_name'   => $row[1],
        //         'email'      => $row[2],
        //         'phone'      => $row[3],
        //         'gender'     => $row[4],

        //     ]);
        // }
        $rows = $rows->slice(1);

        foreach ($rows as $row) 
        {
            $data = [
                'branch_id'   => intval($row[0]),
                'first_name'  => $row[1],
                'last_name'   => $row[2],
                'email'       => $row[3],
                'phone'       => $row[4],
                'gender'      => $row[5],
            ];

            LargeDataset::create($data);
        }
    }
    public function chunkSize(): int
    {
        return 1000;
    }
}

