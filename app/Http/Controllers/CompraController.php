<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\User;
use App\Models\Produto;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    // Exibe a lista de todas as compras
    public function index()
    {
        $compras = Compra::with('usuario', 'produto')->get();
        return view('admin.compras.index', compact('compras')); // Retorna a view com a lista de compras
    }

    // Exibe o formulário para criar uma nova compra
    public function create()
    {
        $usuarios = User::all();
        $produtos = Produto::all();
        return view('admin.compras.create', compact('usuarios', 'produtos'));
    }

    // Armazena uma nova compra
    public function store(Request $request)
    {
        // Valida os dados
        $request->validate([
            'usuario_id' => 'nullable|exists:users,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'preco_total' => 'required|numeric',
        ]);

        // Cria a compra
        Compra::create([
            'usuario_id' => $request->usuario_id,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'preco_total' => $request->preco_total,
        ]);

        // Mensagem de sucesso
        session()->flash('success', 'Compra realizada com sucesso!');

        // Redireciona para a lista de compras
        return redirect()->route('admin.compras.index');
    }

    // Exibe o formulário para editar uma compra
    public function edit($id)
    {
        $compra = Compra::findOrFail($id);
        $usuarios = User::all();
        $produtos = Produto::all();
        return view('admin.compras.edit', compact('compra', 'usuarios', 'produtos'));
    }

    // Atualiza uma compra existente
    public function update(Request $request, $id)
    {
        // Valida os dados
        $request->validate([
            'usuario_id' => 'nullable|exists:users,id',
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'preco_total' => 'required|numeric',
        ]);

        // Encontra a compra pelo ID
        $compra = Compra::findOrFail($id);
        $compra->update([
            'usuario_id' => $request->usuario_id,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'preco_total' => $request->preco_total,
        ]);

        // Mensagem de sucesso
        session()->flash('success', 'Compra atualizada com sucesso!');

        // Redireciona para a lista de compras
        return redirect()->route('admin.compras.index');
    }

    // Deleta uma compra
    public function destroy($id)
    {
        // Encontra e deleta a compra
        $compra = Compra::findOrFail($id);
        $compra->delete();

        // Mensagem de sucesso
        session()->flash('success', 'Compra excluída com sucesso!');

        // Redireciona para a lista de compras
        return redirect()->route('admin.compras.index');
    }
}
