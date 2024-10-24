<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="formulario">
    <h1>Formulário de cadastro</h1>
    <form action="inserir.php" method="post">

        <label>CPF: </label><br>
        <input type="number" name="cpf_cliente" class="cadastro"> <br><br>

        <label>NOME: </label><br>
        <input type="text" name="nome_cliente" class="cadastro"> <br><br>

        <label>DATA: </label><br>
        <input type="date" name="data_nascimento" class="cadastro"> <br><br>

        <label>TELEFONE: </label><br>
        <input type="number" name="celular_cliente" class="cadastro"> <br><br>

        <button type="submit">Salvar</button>   
    </form>
    </div>

    <h1>Gerenciar clientes cadastrados</h1>
    <div id="cartoes2">
  <?php
    include "conexao.php";
    // 1º Passo - Comando SQL
    $sql = "SELECT * FROM tb_clientes";

    // 2º Passo - Preparar a conexão
    $consultar = $pdo->prepare($sql);

    // 3º Passo - Tentar executar e mostrar na página
    try{
        $consultar->execute();
        $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultados as $item){
            $cpf = $item['cpf_cliente'];
            $nome = $item['nome_cliente'];
            $dataDeNasc = $item['data_nascimento'];
            $celular = $item['celular_cliente'];
            
            echo "
                <div class='cartoes'>
                    <h1> $cpf </h1> <br>
                    <p>  $nome </p>
                    <p>  $dataDeNasc </p>
                    <p>  $celular </p>
                    <a href='pagina_editar.php?cod=$cpf'>
                        <button>✏️Editar</button>
                    </a>
                    
                    <a href='confirmar_deletar.php?cod=$cpf'>
                        <button>🗑️Deletar</button>
                    </a>
                </div>
            ";
        }
    }catch(PDOException $erro){
        echo "Falha ao consultar!".$erro->getMessage();
    }
    
    
    
  ?>
  </div>
</body>
</html>