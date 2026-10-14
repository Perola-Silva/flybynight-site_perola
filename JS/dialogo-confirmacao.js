const modal = document.getElementById('modalConfirmacao');
const btnCancelar = document.getElementById('btnCancelar');
const btnConfirmarExclusao = document.getElementById('btnConfirmarExclusao');

// Variáveis para guardar temporariamente os IDs clicados
let lojaIdParaExcluir = null;
let produtoIdParaExcluir = null;

// 1. Monitora o clique nos links "Excluir" da tabela
document.querySelectorAll('.excluir').forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault(); // Impede o link de atualizar a página

        // Guarda os IDs da linha atual nas variáveis temporárias
        lojaIdParaExcluir = link.getAttribute('data-loja');
        produtoIdParaExcluir = link.getAttribute('data-produto');

        // Abre o modal
        modal.showModal();
    });
});

// 2. Se clicar em Cancelar, apenas fecha o modal nativamente
btnCancelar.addEventListener('click', () => {
    modal.close();
});

// 3. Se clicar em "Sim, excluir", redireciona para o excluir.php passando os IDs
btnConfirmarExclusao.addEventListener('click', () => {
    if (lojaIdParaExcluir && produtoIdParaExcluir) {
        // Redireciona a página atual enviando os dados via GET
        window.location.href = `excluir.php?loja_id=${lojaIdParaExcluir}&produto_id=${produtoIdParaExcluir}`;
    }
});