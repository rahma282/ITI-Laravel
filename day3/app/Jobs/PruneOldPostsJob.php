<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use App\Models\Post;

class PruneOldPostsJob implements ShouldQueue
{
    use Queueable;
    use Dispatchable, InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //file_put_contents("log.txt","hi");
        $twoYearsAgo = Carbon::now()->subYears(2);

        //Delete posts older than 2 years
        Post::where('created_at', '<', $twoYearsAgo)->delete();

    }
}
