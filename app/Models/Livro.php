<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livro extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = ['titulo', 'editora', 'edicao', 'ano_publicacao'];

    public function autor()
    {
        return $this->belongsToMany(Autor::class, 'livro_autores', 'livro_id', 'autor_id');
    }

    public function assunto()
    {
        return $this->belongsToMany(Assunto::class, 'livro_assuntos', 'livro_id', 'assunto_id');
    }

    public static function autoresAssuntos()
    {
        return self::with(['autor', 'assunto'])->get();
    }
    
}
