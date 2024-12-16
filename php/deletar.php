<?php
require __DIR__ . '/database/conectar.php';
$tb = "produtos";

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    try {
        $stmt = $conx->prepare("DELETE FROM $db.$tb WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Verifica se alguma linha foi afetada
        if ($stmt->rowCount() > 0)
            echo 'Item excluído com sucesso.';
        else
            echo 'Nenhum item foi encontrado para excluir.';
    } catch(PDOException $e) {
        echo 'Erro ao deletar o item: ' . $e->getMessage();
    }
    
    $conx = null;
} 
else echo 'ID não fornecido.';
?>