<?php
// Route::post('admin/toggle-theme', [ConfiguracaoController::class, 'toggleTheme'])->name('toggle-theme');

use App\Http\Controllers\PaginaEstaticasController;
use App\Http\Controllers\UsuarioController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [PaginaEstaticasController::class, 'welcome'])->name("welcome");

// Rota corrigida
Route::get('/politica', [PaginaEstaticasController::class, 'index'])->name("politica");

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









