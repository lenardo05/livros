<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Models\Assunto;
use App\Models\Autor;
use App\Http\Requests\LivroRequest;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::autoresAssuntos();

        $dadosLivros = $livros->map(function ($livro) {
            return [
                'id' => $livro->id,
                'titulo' => $livro->titulo,
                'editora' => $livro->editora,
                'edicao' => $livro->edicao,
                'ano_publicacao' => $livro->ano_publicacao,
                'autor' => $livro->autor->pluck('nome')->first(),
                'assunto' => $livro->assunto->pluck('descricao')->first(),
            ];
        });
        return view('livros.index', compact('dadosLivros'));
    }

    public function show($id)
    {
        $livro = Livro::find($id);

        return view('livros.show', compact('livro'));
    }

    public function create()
    {
        $assuntos = Assunto::all();
        $autores = Autor::all();

        return view('livros.create', compact('assuntos', 'autores'));
    }

    public function store(LivroRequest $request)
    {
        try {
            $livro = Livro::create([
                'titulo' => $request->input('titulo'),
                'editora' => $request->input('editora'),
                'edicao' => $request->input('edicao'),
                'ano_publicacao' => $request->input('ano_publicacao'),
            ]);

            $livro->autor()->attach($request->input('autor_id'));
            $livro->assunto()->attach($request->input('assunto_id'));

            return redirect()->back()->with('success', 'Livro cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar o livro: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $assuntos = Assunto::all();
        $autores = Autor::all();
        $livro = Livro::autoresAssuntos()->find($id);

        return view('livros.edit', compact('livro', 'assuntos', 'autores'));
    }

    public function update(LivroRequest $request, $id)
    {
        try {
            $livro = Livro::findOrFail($id);
            $livro->update([
                'titulo' => $request->input('titulo'),
                'editora' => $request->input('editora'),
                'edicao' => $request->input('edicao'),
                'ano_publicacao' => $request->input('ano_publicacao'),
            ]);

            $livro->autor()->sync($request->input('autor_id'));
            $livro->assunto()->sync($request->input('assunto_id'));

            return redirect()->back()->with('success', 'Livro atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar o livro: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Livro::findOrFail($id)->delete();

            return redirect()->back()->with('success', 'Livro excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir o livro: ' . $e->getMessage());
        }
    }
    
}
