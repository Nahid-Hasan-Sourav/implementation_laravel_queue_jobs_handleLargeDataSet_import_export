<?php

namespace App\Jobs;

use App\Models\LargeDataset;
use App\Models\User;
use App\Mail\SendMailToUsers;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class sendMailTousersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $user;
    public $product;

    public function __construct($product)
    {
        // $this->user = $user;
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        LargeDataset::chunk(1000, function ($users) {
            foreach ($users as $user) {
                Mail::to($user->email)->send(new SendMailToUsers($this->product, $user));
            }
        });
    }

}
