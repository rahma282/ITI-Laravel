<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\PruneOldPostsJob;

class PruneOldPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prune-old-posts-job';
    protected $description = 'Prune posts older than 2 years';


    /**
     * The console command description.
     *
     * @var string
     */


    /**
     * Execute the console command.
     */
    public function handle()
    {
        PruneOldPostsJob::dispatch();
        $this->info('Old posts pruning job has been dispatched.');
    }
}
