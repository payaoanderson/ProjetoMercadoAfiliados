<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Inclua o CSS do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Estilos globais */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: background-color 0.3s ease;
        }

        /* Estilos para o menu lateral */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradiente azul */
            color: #fff;
            padding-top: 30px;
            box-shadow: 4px 0px 20px rgba(0, 0, 0, 0.1);
            z-index: 100;
            transition: width 0.4s ease, box-shadow 0.3s ease;
            overflow-y: auto; /* Barra de rolagem */
        }

        .sidebar .sidebar-header {
            text-align: center;
            font-size: 2em;
            margin-bottom: 40px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #fff;
            text-transform: uppercase;
        }

        .sidebar ul {
            padding: 0;
            list-style: none;
        }

        .sidebar ul li {
            padding: 18px 30px;
            margin-bottom: 12px;
            border-radius: 8px;
            transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .sidebar ul li:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .sidebar ul li a i {
            margin-right: 20px;
            font-size: 22px;
            transition: color 0.3s ease;
        }

        .sidebar ul li a:hover {
            color: #FFD700;
        }

        .sidebar ul li a:hover i {
            color: #FFD700;
        }

        .sidebar .active {
            background-color: #FFD700;
            color: #fff;
        }

        /* Estilos para os botões de Login, Registrar e Sair */
        .sidebar .auth-buttons {
            margin-top: 50px;
            padding: 20px 30px;
            position: sticky;
            bottom: 0;
        }

        .sidebar .auth-buttons a {
            display: block;
            margin-bottom: 15px;
            padding: 12px 20px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            background-color: #FF6F61;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .sidebar .auth-buttons a:hover {
            background-color: #44c4ff;
            transform: scale(1.05);
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.4s ease;
        }

        /* Estilos para o modo claro/escuro */
        body.dark-mode {
            background-color: #181818;
            color: #fff;
        }

        body.dark-mode .sidebar {
            background: linear-gradient(135deg, #1f1f1f, #282828);
        }

        body.dark-mode .sidebar a:hover {
            background-color: #424242;
        }

        body.dark-mode .main-content {
            background-color: #121212;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .sidebar {
                width: 250px;
            }

            .main-content {
                margin-left: 250px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
            }
        }
    </style>
</head>
<body class="{{ session('theme', 'light') }}">

    <!-- Menu Lateral -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Admin Dashboard</h4>
        </div>

        <!-- Itens do menu -->
        <ul>
            <li><a href="#" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{route("admin.usuarios.index")}}" class="{{ request()->is('admin/usuarios') ? 'active' : '' }}"><i class="fas fa-users"></i> Usuários</a></li>
            <li><a href="{{ route('admin.produto.index') }}" class="{{ request()->is('admin/produtos') ? 'active' : '' }}"><i class="fas fa-cogs"></i> Produtos</a></li>
            <li><a href="#" class="{{ request()->is('admin/vendas') ? 'active' : '' }}"><i class="fas fa-chart-line"></i> Vendas</a></li>
            <li><a href="#" class="{{ request()->is('admin/relatorios') ? 'active' : '' }}"><i class="fas fa-file-alt"></i> Relatórios</a></li>
            <li><a href="#" class="{{ request()->is('admin/configuracoes') ? 'active' : '' }}"><i class="fas fa-cogs"></i> Configurações</a></li>
            <li><a href="#" class="{{ request()->is('admin/compras') ? 'active' : '' }}"><i class="fas fa-shopping-cart"></i> Compras</a></li>
            <li><a href="#" class="{{ request()->is('admin/ajuda') ? 'active' : '' }}"><i class="fas fa-question-circle"></i> Ajuda</a></li>
            <li><a href="#" class="{{ request()->is('admin/suporte') ? 'active' : '' }}"><i class="fas fa-headset"></i> Suporte</a></li>
            <li><a href="#" class="{{ request()->is('admin/patrocinadores') ? 'active' : '' }}"><i class="fas fa-handshake"></i> Patrocinadores</a></li>
        </ul>

        <!-- Botões de Login, Registrar e Sair -->
        <div class="auth-buttons">
            <a href="#" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login</a>
            <a href="#" class="btn-register"><i class="fas fa-user-plus"></i> Registrar</a>
            <a href="#" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
        </div>
    </div>

    <!-- Conteúdo Principal -->
    <div class="main-content">
        @yield('content')  <!-- Aqui será renderizado o conteúdo de cada página -->
    </div>


    <!-- Inclua o JS do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
