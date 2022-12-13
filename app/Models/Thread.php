<?php

namespace App\Models;

use App\Traits\HasLikes;
use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thread extends Model
{
    use HasLikes;
    use HasFactory;

    const TABLE = 'threads';
    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'description',
        'image',
        'category_id',
        'user_id'
    ];

    protected $whith = [
        'likesRelation',
    ];

    public function id(): int
    {
        return $this->id;
    }

    // cada hilo está dentro de una categoría
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
     // cada hilo tiene 1 usuario
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
