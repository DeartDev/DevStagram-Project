<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    // Definir la tabla asociada al modelo
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
    ];

    // Definir la relación de los post con el usuario
    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'username', 'name']);
    }
}
