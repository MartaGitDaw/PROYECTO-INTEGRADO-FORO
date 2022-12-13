<?php

namespace App\Jobs;

use App\Exceptions\CannotLikeItem;
use App\Models\Thread;
use App\Models\User;
// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldBeUnique;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;

// class LikeThreadJob implements ShouldQueue
class LikeThreadJob
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
        if ($this->thread->isLikedBy($this->user)) {
            throw CannotLikeItem::alreadyLiked('thread');
        }

        $this->thread->likedBy($this->user);
    }
}
