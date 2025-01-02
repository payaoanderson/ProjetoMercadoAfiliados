<?php
namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('produto')->paginate(10); // Paginação
        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        $produtos = Produto::all(); // Listar produtos para o formulário
        return view('admin.sales.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'preco_total' => 'required|numeric|min:0',
        ]);

        Sale::create($request->all());

        return redirect()->route('admin.sales.index')->with('success', 'Venda criada com sucesso!');
    }

    public function show(Sale $sale)
    {
        return view('admin.sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $produtos = Produto::all();
        return view('admin.sales.edit', compact('sale', 'produtos'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'preco_total' => 'required|numeric|min:0',
        ]);

        $sale->update($request->all());

        return redirect()->route('admin.sales.index')->with('success', 'Venda atualizada com sucesso!');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('admin.sales.index')->with('success', 'Venda excluída com sucesso!');
    }
}
