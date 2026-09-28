<?php
// src/fornecedor_crud.php

// todas as funções criadas neste arquivo precisarão do script de conexão
require_once "conecta.php";

// Usada em fornecedores/listar.php
function buscarFornecedores(PDO $conexao): array {
    // Montanbdo o comando SQL para consulta
    $sql = "SELECT * FROM fornecedores ORDER BY nome";

    // Executando o comando
    $consulta = $conexao->query($sql);

    // Retornando o resultado como um array associativo
    return $consulta->fetchAll();
}