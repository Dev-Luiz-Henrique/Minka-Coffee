<?php 
session_start();
$tb = "produtos";

if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $cores = filter_input(INPUT_POST, 'cores', FILTER_SANITIZE_STRING);
    $tipo = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING);

    require(__DIR__ . '/database/conectar.php');

    try {           
        $incl = "INSERT INTO $db.$tb (nome, descricao, preco, cor, tipo) VALUES (?, ?, ?, ?, ?)";
        $res = $conx->prepare($incl);
        
        $res->bindParam(1, $nome);
        $res->bindParam(2, $descricao);
        $res->bindParam(3, $preco);
        $res->bindParam(4, $cores);
        $res->bindParam(5, $tipo);

        $res->execute(); 
        $_SESSION['mens'] = "Inclusão realizada com sucesso!";
    } catch(PDOException $e) { 
        $_SESSION['mens'] = "Inclusão não realizada: " . $e->getMessage();
        echo $e->getMessage();
    }

    $conx = null;
    header("Location: ../views/cardapio.php");
    exit; 
}
?>