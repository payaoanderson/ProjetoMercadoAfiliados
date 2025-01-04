<?php

namespace App\Http\Controllers;

use App\Models\Relatorio;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index()
    {
        $relatorios = Relatorio::all();
        return view('admin.relatorio.index', compact('relatorios'));
    }

    public function create()
    {
        return view('admin.relatorio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'tipo' => 'nullable|string|max:100',
        ]);

        Relatorio::create($request->all());

        return redirect()->route('admin.relatorio.index')->with('success', 'Relatório criado com sucesso!');
    }

    public function edit($id)
    {
        $relatorio = Relatorio::findOrFail($id);
        return view('admin.relatorio.edit', compact('relatorio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'tipo' => 'nullable|string|max:100',
        ]);

        $relatorio = Relatorio::findOrFail($id);
        $relatorio->update($request->all());

        return redirect()->route('admin.relatorio.index')->with('success', 'Relatório atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $relatorio = Relatorio::findOrFail($id);
        $relatorio->delete();

        return redirect()->route('admin.relatorio.index')->with('success', 'Relatório excluído com sucesso!');
    }
}
