<?php

require_once "conecta.php";

function buscarLojasProdutos(PDO $conexao): array{
    $sql = "SELECT 
                lojas.nome AS nome_loja,
                lojas.id AS loja_id,
                produtos.nome AS nome_produto,
                produtos.id AS produto_id,
                lojas_produtos.estoque
            FROM lojas_produtos  
            JOIN lojas ON lojas.id = lojas_produtos.loja_id
            JOIN produtos ON produtos.id = lojas_produtos.produto_id
            ORDER BY nome_loja";

    $consulta = $conexao->query($sql);
    return $consulta->fetchAll();
}

function inserirLojaProduto(PDO $conexao, int $loja_id, int $produto_id, int $estoque): void{
    $sql = "INSERT INTO lojas_produtos(loja_id, produto_id, estoque)
            VALUES (:loja_id, :produto_id, :estoque)";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(":loja_id", $loja_id);
    $consulta->bindValue(":produto_id", $produto_id);
    $consulta->bindValue(":estoque", $estoque);

    $consulta->execute();
}