<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autor extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = 'autores';
    protected $fillable = ['nome'];

    public function livro()
    {
        return $this->belongsToMany(Livro::class, 'livro_autores', 'autor_id', 'livro_id');
    }

    public function livros($livroId = null, $autorId = null)
    {
        return $this->hasManyThrough(Livro::class, LivroAutor::class, 'autor_id', 'id', 'id', 'livro_id')
            ->when($livroId, function ($query) use ($livroId) {
                $query->where('livros.id', $livroId);
            })
            ->when($autorId, function ($query) use ($autorId) {
                $query->where('autores.id', $autorId);
            })
            ->get();
    }
}
