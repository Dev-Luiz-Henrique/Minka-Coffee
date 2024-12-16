<?php

require 'conectar.php';

$tb = "produtos";

if($conx){   
    try {	
        $criatb = "CREATE TABLE IF NOT EXISTS $tb (
            id        INT(6)       UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nome      VARCHAR(20)  NOT NULL,
            descricao VARCHAR(60)  NOT NULL,
            preco     DECIMAL(5,2) NOT NULL,
            cor       VARCHAR(6)   NOT NULL,
            tipo      VARCHAR(10)  NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

        $conx->exec($criatb);          
        echo "<p>Tabela criada com sucesso!</p>";
    } catch(PDOException $e) { 
        echo "Erro ao criar a tabela:<br>" . $e->getMessage();
    }   

    try {
        $stmt = $conx->prepare("INSERT INTO $tb (nome, descricao, preco, cor, tipo) 
            VALUES (:nome, :descricao, :preco, :cor, :tipo)");

        $produtos = [
            ['nome' => 'bolo de mirtilo', 'descricao' => 'bolo de baunilha, recheio de mirtilo e cobertura de chantily', 
                'preco' => 15.50, 'cor' => 'blue', 'tipo' => 'cake'],
            ['nome' => 'iced matcha latte', 'descricao' => 'cha de matcha misturado com leite e baunilha', 
                'preco' => 10.00, 'cor' => 'green', 'tipo' => 'glass'],
            ['nome' => 'espresso', 'descricao' => 'cafe preto', 
                'preco' => 8.00, 'cor' => 'black', 'tipo' => 'cup'],
            ['nome' => 'croissant', 'descricao' => 'croissant de manteiga, levemente folhado', 
                'preco' => 7.50, 'cor' => 'yellow', 'tipo' => 'cake'],
            ['nome' => 'chocolate quente', 'descricao' => 'chocolate quente cremoso com chantily', 
                'preco' => 12.00, 'cor' => 'brown', 'tipo' => 'cup']
        ];

        foreach ($produtos as $produto) {
            $stmt->execute($produto);
        }

        echo "<p>Registros inseridos com sucesso!</p>";
    } catch(PDOException $e) { 
        echo "Erro ao inserir registros:<br>" . $e->getMessage();
    }
}

$conx = null;  
?>