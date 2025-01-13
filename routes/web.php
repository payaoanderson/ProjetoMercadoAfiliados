<?php
// Route::post('admin/toggle-theme', [ConfiguracaoController::class, 'toggleTheme'])->name('toggle-theme');

use App\Http\Controllers\PaginaEstaticasController;
use App\Http\Controllers\UsuarioController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PatrocinadorController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\ConfiguracaoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CookieController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;





Route::get('/', [PaginaEstaticasController::class, 'welcome'])->name("welcome");

// Rota corrigida
Route::get('/politica', [PaginaEstaticasController::class, 'index'])->name("politica");

Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/ajuda', function () {
    return view('admin.ajuda.index');
})->name('admin.ajuda.index');


Route::get('/suporte', function () {
    return view('admin.suporte.index');
})->name('admin.suporte.index');



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



Route::get('/relatorios', [RelatorioController::class, 'index'])->name('admin.relatorio.index');
Route::get('/relatorios/create', [RelatorioController::class, 'create'])->name('admin.relatorio.create');
Route::post('/relatorios', [RelatorioController::class, 'store'])->name('admin.relatorio.store');
Route::get('/relatorios/{id}/edit', [RelatorioController::class, 'edit'])->name('admin.relatorio.edit');
Route::put('/relatorios/{id}', [RelatorioController::class, 'update'])->name('admin.relatorio.update');
Route::delete('/relatorios/{id}', [RelatorioController::class, 'destroy'])->name('admin.relatorio.destroy');


Route::get('/patrocinadores', [PatrocinadorController::class, 'index'])->name('admin.patrocinadores.index');
Route::get('/patrocinadores/create', [PatrocinadorController::class, 'create'])->name('admin.patrocinadores.create');
Route::post('/patrocinadores', [PatrocinadorController::class, 'store'])->name('admin.patrocinadores.store');
Route::get('/patrocinadores/{patrocinador}', [PatrocinadorController::class, 'show'])->name('admin.patrocinadores.show');
Route::get('/patrocinadores/{patrocinador}/edit', [PatrocinadorController::class, 'edit'])->name('admin.patrocinadores.edit');
Route::put('/patrocinadores/{patrocinador}', [PatrocinadorController::class, 'update'])->name('admin.patrocinadores.update');
Route::delete('/patrocinadores/{patrocinador}', [PatrocinadorController::class, 'destroy'])->name('admin.patrocinadores.destroy');


});



Route::get('donations', [DonationController::class, 'index'])->name('admin.donations.index');
Route::get('donations/create', [DonationController::class, 'create'])->name('admin.donations.create');
Route::post('donations', [DonationController::class, 'store'])->name('admin.donations.store');
Route::get('donations/{id}/edit', [DonationController::class, 'edit'])->name('admin.donations.edit');
Route::put('donations/{id}', [DonationController::class, 'update'])->name('admin.donations.update');
Route::delete('donations/{id}', [DonationController::class, 'destroy'])->name('admin.donations.destroy');
Route::get('/donation/{id}/generate-qrcode', [DonationController::class, 'generate'])->name('admin.donation.generate');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

