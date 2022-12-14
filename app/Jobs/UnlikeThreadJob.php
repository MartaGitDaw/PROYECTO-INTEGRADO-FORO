<?php

namespace App\Jobs;

use App\Models\Thread;
use App\Models\User;
// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldBeUnique;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;

// class UnlikeThreadJob implements ShouldQueue
class UnlikeThreadJob
{
    // use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $thread;
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Thread $thread, User $user)
    {
        $this->thread = $thread;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->thread->dislikedBy($this->user);
    }
}