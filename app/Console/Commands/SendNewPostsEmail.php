<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Console\Command;

class SendNewPostsEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send new posts to all subscribers';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $newPosts = Post::where('is_notified', false)->get();

        if ($newPosts->isEmpty()) {
            $this->info('No new posts to send.');
            return;
        }

        $subscriptions = Subscription::with('user:id,email')->get();

        foreach ($newPosts as $post) {
            foreach ($subscriptions as $subscription) {
                $this->line("Email sent to: " . $subscription->user->email);
                dispatch(new SendEmail($subscription, $post));
                sleep(1);
            }
            $post->update(['is_notified' => true]);
        }

        $this->info('All emails have been sent to the queue.');
    }
}
