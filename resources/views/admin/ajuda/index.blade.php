@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajuda</h1>
    <p>Se você está tendo dificuldades ou tem alguma dúvida, nossa equipe de suporte está à disposição para ajudar.</p>

    <h3>Principais Tópicos de Ajuda</h3>
    <ul>
        <li><a href="{{ route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{ route('admin.usuarios.index')}}">Usuários</a></li>
        <li><a href="{{ route('admin.produto.index')}}">Produtos</a></li>
        <li><a href="{{ route('admin.sales.index')}}">Vendas</a></li>
        <li><a href="{{ route('admin.compras.index')}}">Compras</a></li>
        <li><a href="{{ route('admin.configuracao.index')}}">Configurações</a></li>
        <li><a href="{{ route('admin.relatorio.index')}}">Relatórios</a></li>
        <li><a href="{{ route('admin.ajuda.index')}}">Ajuda</a></li>
        <li><a href="{{ route('admin.suporte.index')}}">Suporte</a></li>
        <li><a href="#patrocinadores">Patrocinadores</a></li>
    </ul>

    <h3 id="dashboard">Dashboard</h3>
    <p>O Dashboard exibe uma visão geral de todas as métricas importantes do seu sistema.</p>

    <h3 id="usuarios">Usuários</h3>
    <p>Aqui você pode gerenciar todos os usuários cadastrados na plataforma.</p>

    <h3 id="produtos">Produtos</h3>
    <p>Gerencie os produtos cadastrados, incluindo a adição, edição e exclusão de produtos.</p>

    <h3 id="vendas">Vendas</h3>
    <p>Aqui você pode visualizar e gerenciar todas as vendas realizadas.</p>

    <h3 id="compras">Compras</h3>
    <p>Na seção de compras, você pode acompanhar todas as compras feitas no sistema.</p>

    <h3 id="configuracoes">Configurações</h3>
    <p>Faça ajustes nas configurações do sistema, como preferências de idioma e opções de pagamento.</p>

    <h3 id="relatorios">Relatórios</h3>
    <p>Você pode gerar relatórios detalhados sobre as atividades no seu sistema.</p>

    <h3 id="ajuda">Ajuda</h3>
    <p>Se você está tendo dificuldades ou tem alguma dúvida, nossa equipe de suporte está à disposição para ajudar.</p>

    <h3 id="suporte">Suporte</h3>
    <p>Para dúvidas específicas ou problemas técnicos, você pode falar diretamente conosco através do WhatsApp:</p>
    <p><a href="https://wa.me/5514997125004" target="_blank">Clique aqui para falar no WhatsApp</a></p>

    <h3 id="patrocinadores">Patrocinadores</h3>
    <p>Saiba mais sobre como se tornar um patrocinador e apoiar a nossa plataforma.</p>

    @include("include.rodape")
</div>
@endsection
