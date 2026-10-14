<?php 
require_once "../src/loja_produto_crud.php";
require_once "../src/loja_crud.php";
require_once "../src/produto_crud.php";


$loja_id = $_GET['loja_id'];
$produto_id = $_GET['produto_id'];

$lojas = buscarLojas($conexao);
$produtos = buscarProdutos($conexao);

$lojaProduto = buscarLojaProdutoPorIds($conexao, $loja_id, $produto_id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $novo_loja_id = $_POST['loja'];
    $novo_produto_id = $_POST['produto'];
    $estoque = $_POST['estoque'];

    atualizarLojaProduto($conexao, $novo_loja_id, $novo_produto_id, $estoque, $loja_id, $produto_id);

    header("location:listar.php");

    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto em uma loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas_produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar produto em uma loja</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <!-- Os campos serão preenchidos com os dados do registro selecionado. -->
        <form action="" method="post">

            <div>
                <label for="loja">Loja:</label>
                <select name="loja" id="loja" required>
                    <?php foreach($lojas as $loja): ?>
                        <option <?= ($lojaProduto['loja_id'] == $loja['id']) ? 'selected' : '' ?>
                        value="<?= $loja['id'] ?>">
                        <?= $loja['nome'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div>
                <label for="produto">Produto:</label>
                <select name="produto" id="produto" required>
                    <?php foreach($produtos as $produto): ?>
                        <option <?= ($lojaProduto['produto_id'] == $produto['id']) ? 'selected' : '' ?>
                        value="<?= $produto['id'] ?>">
                        <?= $produto['nome_produto'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label for="estoque">Estoque:</label>
                <input value="<?= $lojaProduto['estoque'] ?>" type="number" name="estoque" id="estoque" min="0" step="1" required>
            </div>
            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>