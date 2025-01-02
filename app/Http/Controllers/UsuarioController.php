<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Exibir todos os usuários
    public function index()
    {
        $users = User::all();
        return view('admin.usuarios.index', compact('users'));
    }

    // Exibir o formulário para criação de usuário
    public function create()
    {
        return view('admin.usuarios.create');
    }

    // Armazenar o novo usuário no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|nullable',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    // Exibir um único usuário
    public function show(User $user)
    {
        return view('admin.usuarios.show', compact('user'));
    }

    // Exibir o formulário para editar o usuário
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.usuarios.edit', compact('user'));
    }

    // Atualizar as informações do usuário
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'nome' => 'required|string|max:255|nullable',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    if ($request->password) {
        $user->password = bcrypt($validated['password']);
    }

    $user->nome = $validated['nome'];
    $user->email = $validated['email'];
    $user->save();

    return redirect()->route('admin.usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
}

    // Excluir um usuário
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Encontra o usuário ou retorna erro 404
    
        $user->delete(); // Exclui o usuário
    
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
