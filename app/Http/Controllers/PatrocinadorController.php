<?php

namespace App\Http\Controllers;

use App\Models\Patrocinador;
use Illuminate\Http\Request;

class PatrocinadorController extends Controller
{
    public function index()
    {
        $patrocinadores = Patrocinador::all();
        return view('admin.patrocinadores.index', compact('patrocinadores'));
    }

    public function create()
    {
        return view('admin.patrocinadores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Patrocinador::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('admin.patrocinadores.index')->with('success', 'Patrocinador criado com sucesso.');
    }

    public function show(Patrocinador $patrocinador)
    {
        return view('admin.patrocinadores.show', compact('patrocinador'));
    }

    public function edit(Patrocinador $patrocinador)
    {
        return view('admin.patrocinadores.edit', compact('patrocinador'));
    }

    public function update(Request $request, Patrocinador $patrocinador)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $patrocinador->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('admin.patrocinadores.index')->with('success', 'Patrocinador atualizado com sucesso.');
    }

    public function destroy(Patrocinador $patrocinador)
    {
        $patrocinador->delete();

        return redirect()->route('admin.patrocinadores.index')->with('success', 'Patrocinador excluído com sucesso.');
    }
}
