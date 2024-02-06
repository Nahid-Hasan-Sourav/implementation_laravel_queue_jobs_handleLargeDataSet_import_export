<?php

namespace App\Jobs;

use App\Imports\LargeDataSetImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProccessLargeDatasetImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }
    /**
     * Execute the job.
     */
    public function handle()
    {
        $file = Storage::path($this->filePath);

        // Process the Excel file using Laravel Excel
        $data =Excel::toCollection(new LargeDataSetImport, $file);
        
    }
}
