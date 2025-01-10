<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/main.css" />
    <title>Mercado de produtos afiliados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
  <body>
    <div>
    <nav class="container">
      <header class="cabecalho">
        <div class="navegation">
          <div>
            <ul>
              <img src="{{ asset('./img/logo.webp')}}"  class="mx-auto d-block" alt="" width="150" />
            </ul>
          </div>
        </div>
      </header>
    </nav>
</div>

    <main class="menu">

      @include("include.login-registrar-sair")
      <div class="conteudoPrincipal">
        <div class="bloco1">
          <h2>Produtos Afiliados Para Você Comprar e Revender</h2>
        </div>
