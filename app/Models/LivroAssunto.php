<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAssunto extends Model
{
    use HasFactory;

    protected $fillable = ['livro_id', 'assunto_id'];

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }

    public function assunto()
    {
        return $this->belongsTo(Assunto::class, 'assunto_id');
    }

    public function livroAssunto()
    {
        return $this->with(['livro', 'assunto'])->get();
    }

}
