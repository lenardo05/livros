<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assunto extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = ['descricao'];

    public function livro()
    {
        return $this->hasManyThrough(Livro::class, LivroAssunto::class, 'assunto_id', 'id', 'id', 'livro_id');
    }

    public function livros($livroId = null, $assuntoId = null)
    {
        return $this->hasManyThrough(Livro::class, LivroAssunto::class, 'assunto_id', 'id', 'id', 'livro_id')
        ->when($livroId, function ($query) use ($livroId) {
            $query->where('livros.id', $livroId);
        })
        ->when($assuntoId, function ($query) use ($assuntoId) {
            $query->where('autores.id', $assuntoId);
        })
        ->get();
    }
}
