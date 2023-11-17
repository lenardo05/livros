<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Http\Requests\AutorRequest;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::all();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }
    
    public function store(AutorRequest $request)
    {
        try {
            Autor::create([
                'nome' => $request->input('nome')
            ]);

            return redirect()->back()->with('success', 'Autor cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar o autor: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autores.edit', compact('autor'));
    }

    public function update(AutorRequest $request, $id) 
    {
        try {
            $autor = Autor::findOrFail($id);
            $autor->update([
                'nome' => $request->input('nome')
            ]);

            return redirect()->back()->with('success', 'Autor atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar o autor: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Autor::findOrFail($id)->delete();

            return redirect()->back()->with('success', 'Autor excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir o autor: ' . $e->getMessage());
        }
    }
}
