<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    // obtener fecha con formato dd/mm/yyyy
    // public function getDate($date){
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
    // }

    // Una categoría tiene varios hilos
    public function threads(): HasMany{
        return $this->hasMany(Thread::class);
    }

    // Scope
    public function scopeName($query, $value){
        if(!isset($value)){
            return $query->where('name', 'like', '%');
        }
            return $query->where('name', 'like', '%'.$value.'%' );
    }
}
