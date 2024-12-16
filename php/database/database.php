<?php

// Configurações do banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$db = "minka_db";

try {
    // Conecta ao servidor MySQL
    $conx = new PDO("mysql:host=$host", $user, $pass);
    $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão com o servidor MySQL ok!<br>";

    // Verifica se o banco de dados já existe
    $result = $conx->query("SHOW DATABASES LIKE '$db'");
    
    if ($result->rowCount() === 0) {
        // O banco de dados não existe, então cria-o
        $criadb = "CREATE DATABASE `$db`";
        $conx->exec($criadb);
        echo "Banco de dados '$db' criado com sucesso!<br>";
    } else {
        echo "O banco de dados '$db' já existe.<br>";
    }
} catch (PDOException $e) {
    echo "Falha de conexão ou erro na criação do banco de dados:<br />" . $e->getMessage();
}

// Encerra a conexão
$conx = null;

?>

