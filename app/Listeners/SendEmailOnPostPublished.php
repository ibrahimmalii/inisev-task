<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Jobs\SendEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;

class SendEmailOnPostPublished
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostPublished $event): void
    {
        Artisan::call('send:posts');
    }
}
