<?php

namespace App\Models;

use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thread extends Model
{
    use HasFactory;


    // cada hilo está dentro de una categoría
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
     // cada hilo tiene 1 usuario
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
