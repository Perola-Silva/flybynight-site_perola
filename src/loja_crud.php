<?php

// src/loja_crud.php

require_once "conecta.php";

function buscarLojas(PDO $conexao){
    $sql = "SELECT * FROM lojas ORDER BY nome";

    $consulta = $conexao->query($sql);

    return $consulta->fetchAll();
}

