<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'thread_id',
    ];

    // cada comentario está dentro de un hilo
    public function Thread(): BelongsTo{
        return $this->belongsTo(Thread::class);
    }

    // un comentario pertenece a un usuario
    public function User(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    // public function countCommentsThread(Thread $thread){
    //     $comments = Comment::all();
    //     $cont=0;
    //     foreach($comments as $comment){
    //         if($thread->id == $comment->thread_id){
    //             $cont++;
    //         }
    //     }
    //     return $cont;
    // }

    public function viewComments(Thread $thread){
        $comments = Comment::all();
            foreach($comments as $comment){
                if($thread->id == $comment->thread_id){
                    
                }
            }
    }
}