<?php
// Route::post('admin/toggle-theme', [ConfiguracaoController::class, 'toggleTheme'])->name('toggle-theme');

use App\Http\Controllers\PaginaEstaticasController;
use App\Http\Controllers\UsuarioController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ConfiguracaoController;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [PaginaEstaticasController::class, 'welcome'])->name("welcome");

// Rota corrigida
Route::get('/politica', [PaginaEstaticasController::class, 'index'])->name("politica");


Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index');
Route::get('/usuarios/criar', [UsuarioController::class, 'create'])->name('admin.usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('admin.usuarios.store');
Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('admin.usuarios.show');
Route::get('/usuarios/{usuario}/editar', [UsuarioController::class, 'edit'])->name('admin.usuarios.edit');
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('admin.usuarios.update');
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy');

Route::get('/produtos', [ProdutoController::class, 'index'])->name('admin.produto.index');
Route::get('/produtos/criar', [ProdutoController::class, 'create'])->name('admin.produto.create');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('admin.produto.store');
Route::get('/produtos/{produto}', [ProdutoController::class, 'show'])->name('admin.produto.show');
Route::get('/produtos/{produto}/editar', [ProdutoController::class, 'edit'])->name('admin.produto.edit');
Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('admin.produto.update');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('admin.produto.destroy');


Route::get('/vendas', [SaleController::class, 'index'])->name('admin.sales.index');
Route::get('/vendas/create', [SaleController::class, 'create'])->name('admin.sales.create');
Route::post('/vendas', [SaleController::class, 'store'])->name('admin.sales.store');
Route::get('admin/sales/{sale}', [SaleController::class, 'show'])->name('admin.sales.show');
Route::get('/vendas/{sale}/edit', [SaleController::class, 'edit'])->name('admin.sales.edit');
Route::put('/vendas/{sale}', [SaleController::class, 'update'])->name('admin.sales.update');
Route::delete('/vendas/{sale}', [SaleController::class, 'destroy'])->name('admin.sales.destroy');


Route::get('/compras', [CompraController::class, 'index'])->name('admin.compras.index');
Route::get('/compras/create', [CompraController::class, 'create'])->name('admin.compras.create');
Route::post('/compras', [CompraController::class, 'store'])->name('admin.compras.store');
Route::get('/compras/{id}/edit', [CompraController::class, 'edit'])->name('admin.compras.edit');
Route::put('/compras/{id}', [CompraController::class, 'update'])->name('admin.compras.update');
Route::delete('/compras/{id}', [CompraController::class, 'destroy'])->name('admin.compras.destroy');


Route::get('config', [ConfiguracaoController::class, 'index'])->name('admin.configuracao.index');
Route::get('config/create', [ConfiguracaoController::class, 'create'])->name('admin.configuracao.create');
Route::post('config', [ConfiguracaoController::class, 'store'])->name('admin.configuracao.store');
Route::get('config/{id}/edit', [ConfiguracaoController::class, 'edit'])->name('admin.configuracao.edit');
Route::put('config/{id}', [ConfiguracaoController::class, 'update'])->name('admin.configuracao.update');

