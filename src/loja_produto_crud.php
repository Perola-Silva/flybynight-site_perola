<?php

function buscarLojasProdutos(PDO $conexao){
    $sql = "SELECT 
                lojas.nome AS nome_loja,
                produtos.nome AS nome_produto,
                lojas_produtos.estoque
            FROM lojas_produtos  
            JOIN lojas ON lojas.id = lojas_produtos.loja_id
            JOIN produtos ON produtos.id = lojas_produtos.produto_id
            ";

    $consulta = $conexao->query($sql);
    return $consulta->fetchAll();
}