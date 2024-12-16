<?php

// Configurações do banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$db = "minka_db";

try {
    $conx = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    exit();
}

// Retorne a conexão para uso posterior
return $conx;
?>
