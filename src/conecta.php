<?php
// src/conect.php

// Parâmetros de conexão ao servidor MySQL

$servidor = 'localhost';
$banco = 'flybynight_completo';
$usuario = 'root';
$senha = 'senacpenha';

/* Usamos o try/catch para realizar as operações de conexão ao servidor */
try {
    // Criando um objeto a partir da classe PDO, definindo uma string de conexão
    // PDO -> PHP Data Objects
    // PDO é uma classe de recursos para manipulação de banco de dados
    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    // Garantindo que erros/exeções serão lançadas/exibidas em qualquer falhe na conexão
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Garantindo que resultados de operações SELECT sejam retornados como array associativo
    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $erro) {
    // "Logaar/registrar" o erro e exibir no terminal os detalhes de erro
    error_log($erro->getMessage());

    // Na interface pública, exibimos uma mensagem generica para o usuario
    exit("Não foi possível conectar ao banco.");
}

var_dump($conexao);