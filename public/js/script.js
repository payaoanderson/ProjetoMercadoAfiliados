// Função para atualizar o ano automaticamente
function atualizarAno() {
    const anoAtual = new Date().getFullYear();  // Obtém o ano atual
    document.getElementById('ano-atual').textContent = anoAtual;  // Atualiza o conteúdo do span
  }
  
  // Chama a função para atualizar o ano na carga da página
  atualizarAno();
  