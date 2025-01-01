<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // Exibir todos os produtos
    public function index()
    {
        $produtos = Produto::all();
        return view('admin.produto.index', compact('produtos'));
    }

    // Mostrar o formulário de criação de produto
    public function create()
    {
        return view('admin.produto.create');
    }

    // Armazenar o produto no banco de dados
    public function store(Request $request)
    {
        // Validar os dados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'comprar' => 'nullable|boolean',
        ]);
    
        // Salvar os dados no banco
        Produto::create([
            'nome' => $validatedData['nome'],
            'descricao' => $validatedData['descricao'] ?? null,
            'comprar' => $request->has('comprar'), // Checkbox retorna verdadeiro se marcado
        ]);
    
        // Redirecionar com mensagem de sucesso
        return redirect()->route('admin.produto.index')->with('success', 'Produto criado com sucesso!');
    }
    // Exibir um produto específico
    public function show(Produto $produto)
    {
        return view('admin.produto.show', compact('produto'));
    }

    // Exibir o formulário de edição de produto
    public function edit(Produto $produto)
    {
        return view('admin.produto.edit', compact('produto'));
    }

    // Atualizar os dados de um produto
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'comprar' => 'required|boolean',
        ]);

        $produto->update($request->all());

        return redirect()->route('admin.produto.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Deletar um produto
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('admin.produto.index')->with('success', 'Produto excluído com sucesso!');
    }
}
