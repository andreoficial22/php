<?php

include "conexao.php";

$usuario = $_POST['usuario_digitado'];
$senha = $_POST['senha_digitada'];

$sql = "SELECT * FROM tb_usuarios
WHERE email='$usuario'AND password='$senha'";


$consulta = $pdo->prepare($sql);


try{
    $consulta->execute();
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    if($resultado){
        session_start();
        $_SESSION['logado']="sim";
        header("Location: index.php");

    }else{

        header("Location: login.php?erro1=sim");


    }


}catch(PDOException $erro){
    echo "falha no login!" .$erro->getMessage();
}




?>