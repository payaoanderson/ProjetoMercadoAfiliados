<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produto;
use App\Models\Sale;
use App\Models\Compra;

class DashboardController extends Controller
{
    public function index()
    {
        // Contagem de usuários e produtos
        $userCount = User::count();
        $productCount = Produto::count();
        $saleCount = Sale::count();
        $compraCount = Compra::count();
        return view('admin.dashboard', compact('userCount', 'productCount', 'saleCount', 'compraCount'));
    }
}
