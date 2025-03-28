<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'imagen', 'user_id'];

    // 🔥 Agregar relación con el usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
