<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasLikes
{
    // cuando llamemos a likes va a crear una relación
    public function likes()
    {
        return $this->likesRelation;
    }

    // relacion de likes con el tipo de like y el id de a lo que le hemos dicho que nos guasta
    public function likesRelation(): MorphMany
    {
        return $this->morphMany(Like::class, 'likesRelations', 'likeable_type', 'likeable_id');
    }

    // relacionar el like con el modelo de a lo que le queremos dar o quitar like
    public static function bootHasLikes()
    {
        static::deleting(function ($model) {
            $model->likesRelation()->delete();
            $model->unsetRelation('likesRelations');
        });
    }

    // establecer relacion
    public function likedBy(User $user)
    {
        $this->likesRelation()->create(['user_id' => $user->id()]);

        $this->unsetRelation('likesRelation');
    }

    // no me gusta
    public function dislikedBy(User $user)
    {
        optional($this->likesRelation()->where('user_id', $user->id())->first())->delete();

        $this->unsetRelation('likesRelation');
    }

    // a quién le gusta
    public function isLikedBy(User $user): bool
    {
        return $this->likesRelation()->where('user_id', $user->id())->exists();
    }
}