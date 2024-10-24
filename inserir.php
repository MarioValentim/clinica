<?php

include "conexao.php";

$cpf = $_POST['cpf_cliente'];
$nome = $_POST['nome_cliente'];
$dataDeNasc = $_POST['data_nascimento'];
$celular = $_POST['celular_cliente'];

//1º passo - comando sql
$sql = "INSERT INTO tb_clientes
        (cpf_cliente, nome_cliente, data_nascimento, celular_cliente) VALUES
        ('$cpf','$nome','$dataDeNasc','$celular')";
//2º passo - preparar conexao
$inserir = $pdo->prepare($sql);
//3º passo - tentar executar
try{
    $inserir->execute();
    header("Location: cadastrados.php");
}catch(PDOException $erro){
    echo "Falha ao inserir".$erro->getMessage();
}

?>