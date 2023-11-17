<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assunto;
use App\Http\Requests\AssuntoRequest;

class AssuntoController extends Controller
{
    public function index()
    {
        $assuntos = Assunto::all();
        return view('assuntos.index', compact('assuntos'));
    }

    public function create()
    {
        return view('assuntos.create');
    }
        
    public function store(AssuntoRequest $request)
    {
        try {
            Assunto::create([
                'descricao' => $request->input('descricao')
            ]);

            return redirect()->back()->with('success', 'Assunto cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar o assunto: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $assunto = Assunto::findOrFail($id);
        return view('assuntos.edit', compact('assunto'));
    }

    public function update(AssuntoRequest $request, $id) 
    {
        try {
            $assunto = Assunto::findOrFail($id);
            $assunto->update([
                'descricao' => $request->input('descricao')
            ]);

            return redirect()->back()->with('success', 'Assunto atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar o assunto: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Assunto::findOrFail($id)->delete();

            return redirect()->back()->with('success', 'Assunto excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir o assunto: ' . $e->getMessage());
        }
    }
}
