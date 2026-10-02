<?php

// src/loja_crud.php

require_once "conecta.php";

function buscarLojas(PDO $conexao): array{
    $sql = "SELECT * FROM lojas ORDER BY nome";

    $consulta = $conexao->query($sql);

    return $consulta->fetchAll();
}

function inserirLoja(PDO $conexao, string $nome): void{
    $sql = "INSERT INTO lojas (nome) VALUES(:nome)";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(":nome", $nome);

    $consulta->execute();
}

function buscarLojaPorId(PDO $conexao, int $id): array{
    $sql = "SELECT * FROM lojas WHERE id = :id";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(":id", $id);

    $consulta->execute();

    return $consulta->fetch();
}