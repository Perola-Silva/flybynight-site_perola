<?php 
/*Exercicios */

//PARTE 1

// 1) Importar os arquivos de função de fornecedores e produtos
require_once "../src/produto_crud.php";
require_once "../src/fornecedor_crud.php";

// 2) Capturar e guardar o id do produto que será carregado/atualizado
$id = $_GET['id'];

// 3) Chamar a função buscarFornecedores e receber a lista dos fornecedores (guarde em uma variavel)
$forncedores = buscarFornecedores($conexao);

// 4) Chamar a função buscarProdutoPorId e receber os dados do produto (guarde em uma variavel)
$produto = buscarProdutoPorId($conexao, $id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $fornecedor_id = $_POST['fornecedor'];

    atualizarProduto($conexao, $id, $nome, $descricao, $preco, $quantidade, $fornecedor_id);

    header("location:listar.php");

    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar produto</h2>
        
        <!-- PARTE 1 -->
        <!-- 5) Exibir os dados do produto em cada campo do formulario, no caso dos campos input, use o atributo value, no caso do campo textarea, coloque o valor dentro da tag -->
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
            <div>
                <label for="nome">Nome:</label>
                <input value="<?= $produto['nome'] ?>" type="text" name="nome" id="nome" maxlength="100" required>
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="5"><?= $produto['descricao'] ?></textarea>
            </div>
            <div>
                <label for="preco">Preço:</label>
                <input value="<?= $produto['preco'] ?>" type="number" name="preco" id="preco" min="0" step="0.01" required>
            </div>
            <div>
                <label for="quantidade">Quantidade:</label>
                <input value="<?= $produto['quantidade'] ?>" type="number" name="quantidade" id="quantidade" min="0" step="1" required>
            </div>
            <div>
                <label for="fornecedor">Fornecedor:</label>
                <select name="fornecedor" id="fornecedor" required>
                    <option value=""></option>
                    <!-- 6) DESAFIO -->
                    <!-- 6.1) Usando foreach acesse os $fornecedores e mostre na tag <option> os nomes de cada fornecedor. -->
                    <?php foreach($forncedores as $forncedor): ?>
                    <!-- 6.2) O fornecedor daquele produto que está sendo exibido, já deve vir selecionado. Programe os recursos para isso acontecer -->
                    <option
                    <?php 
                    // if ($forncedor['id'] == $produto['fornecedor_id']) {
                    // echo 'selected';
                    // }
                    ?>
                    <?= ($forncedor['id'] == $produto['fornecedor_id']) ? 'selected' : '' ?>
                    value="<?= $forncedor['id'] ?>"><?= $forncedor['nome'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>