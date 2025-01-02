<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produto;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function index()
    {
        // Contagem de usuários e produtos
        $userCount = User::count();
        $productCount = Produto::count();
        $saleCount = Sale::count();

        return view('admin.dashboard', compact('userCount', 'productCount', 'saleCount'));
    }
}
