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
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        \Log::info("🧹 PruneOldPostsJob is running...");

        $twoYearsAgo = now()->subYears(2);
        $oldPosts = Post::where('created_at', '<', $twoYearsAgo)->get();

        \Log::info("Found " . $oldPosts->count() . " old posts.");

        foreach ($oldPosts as $post) {
            \Log::info("Deleting post: " . $post->title);
            $post->delete();
        }
    }
}
