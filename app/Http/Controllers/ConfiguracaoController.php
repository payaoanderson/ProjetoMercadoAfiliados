<?php
// app/Http/Controllers/ConfiguracaoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    public function toggleTheme(Request $request)
    {
        $currentTheme = session('theme', 'light');
        $newTheme = ($currentTheme == 'light') ? 'dark' : 'light';

        session(['theme' => $newTheme]);

        return back(); // Redireciona para a página anterior
    }
}
