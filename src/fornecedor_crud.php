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

// Usada em fornecedores/inserir.php
function inserirFornecedor(string $nome, PDO $conexao): void{
    /* Sobre o recebimento de dados para o comando SQL 
    No PDO, visando minimizar a chance de inejeção de código SQL nocivo à partir de entradas de dados no caso, formulario, devemos passar no comando SQL "parâmetros nomeados" (Named Parameters).
    Esse tipo de prática permite receber de forma segura/controlada os dados para consulta. NUNCA passe os dados de forma direta.
    Named Parameter */

    // Passo 1: definir os parâmetros nomeados
    $sql = "INSERT INTO fornecedores (nome) VALUES(:nome)";

    // Passo 2: preparar o comando para execução
    $consulta = $conexao->prepare($sql);

    // Passo 3: vincular um valor no parâmetro nomeado
    $consulta->bindValue(":nome", $nome);

    // Passo 4: executar a consulta/comando no banco
    $consulta->execute();
}