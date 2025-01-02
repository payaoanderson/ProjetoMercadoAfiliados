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
            'preco' => 'required|numeric',  // Validando o campo 'preco'
            'quantidade' => 'required|integer', // Validando o campo 'quantidade'
        ]);
    
        // Salvar o produto no banco de dados
        Produto::create([
            'nome' => $validatedData['nome'],
            'descricao' => $validatedData['descricao'] ?? null,
            'preco' => $validatedData['preco'],  // Armazenando o preço
            'quantidade' => $validatedData['quantidade'],  // Armazenando a quantidade
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
        // Validação
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
        ]);
    
        // Atualizar os campos manualmente
        $produto->nome = $request->input('nome');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');
        $produto->quantidade = $request->input('quantidade');
    
        // Salvar no banco de dados
        $produto->save();
    
        // Redirecionar com mensagem de sucesso
        return redirect()->route('admin.produto.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Deletar um produto
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('admin.produto.index')->with('success', 'Produto excluído com sucesso!');
    }
}
