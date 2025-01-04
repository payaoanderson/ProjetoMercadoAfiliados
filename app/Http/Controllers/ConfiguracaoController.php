<?php

namespace App\Http\Controllers;

use App\Models\Configuracao;
use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    // Exibe todas as configurações
    public function index()
    {
        $configuracoes = Configuracao::all();
        return view('admin.configuracao.index', compact('configuracoes'));
    }

    // Exibe o formulário para criar uma nova configuração
    public function create()
    {
        return view('admin.configuracao.create');
    }

    // Armazena uma nova configuração
    public function store(Request $request)
    {
        $request->validate([
            'chave' => 'required|string|max:255|unique:configuracoes',
            'valor' => 'required|string|max:255',
        ]);

        Configuracao::create([
            'chave' => $request->chave,
            'valor' => $request->valor,
        ]);

        return redirect()->route('admin.configuracao.index')->with('success', 'Configuração criada com sucesso!');
    }

    // Exibe o formulário para editar uma configuração (caso você queira editar no futuro)
    public function edit($id)
    {
        $configuracao = Configuracao::findOrFail($id);
        return view('admin.configuracao.edit', compact('configuracao'));
    }

    // Atualiza uma configuração
    public function update(Request $request, $id)
    {
        $request->validate([
            'chave' => 'required|string|max:255',
            'valor' => 'required|string|max:255',
        ]);

        $config = Configuracao::findOrFail($id);
        $config->update([
            'chave' => $request->chave,
            'valor' => $request->valor,
        ]);

        return redirect()->route('admin.configuracao.index')->with('success', 'Configuração atualizada com sucesso!');
    }
}
