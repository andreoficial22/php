<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<?php

include "verificar_logado.php";


?>

    <h1>Produtos cadastrados</h1>
    <div id="produtos">
        <?php
        include "conexao.php";

        // 1º Passo - Comando SQL
        $sql = "SELECT * FROM tb_produtos";

        // 2º Passo - Preparar a conexão
        $consultar = $pdo->prepare($sql);

        // 3º Passo - Tentar executar
        try {
            $consultar->execute();
            $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultados as $item) {
                $id_encontrado = $item['id_produto'];
                $nome_encontrado = $item['nome_produto'];
                $preco_encontrado = $item['preco'];
                $estoque_encontrado = $item['estoque'];
                $categoria_encontrada = $item['categoria'];
                $imagem_encontrada = $item['imagem'];
                echo "
                    <div class='cartoes'>
                        Cod. do produto: $id_encontrado <br>
                        <img src='$imagem_encontrada' height='50'> <br>
                        $nome_encontrado <br>
                        R$ $preco_encontrado <br>
                        Disponível: $estoque_encontrado <br>
                        Categoria: $categoria_encontrada<hr>
                        <button>✏️ editar  </button>
                        <button>🗑️ deletar</button>
                    </div>
                ";
            }
        } catch (PDOException $erro) {
            echo "Falha ao consultar! " . $erro->getMessage();
        }
        ?>
    </div>
</body>
</html>
