<?php
require __DIR__ . '/database/conectar.php';
$tb = "produtos";

try {
    $sel = "SELECT id, nome, descricao, preco, cor, tipo FROM $db.$tb ORDER BY nome ASC";
    $result = $conx->query($sel);

    if ($result->rowCount() > 0) {
        while($linha = $result->fetch(PDO::FETCH_ASSOC)) {
            $id = htmlspecialchars($linha['id']);

            // Exibe cada produto apenas uma vez
            echo "
                <div class='exibicao'>
                    <button class='exib-del' aria-label='Deletar' data-id='$id' onclick=\"deletarPorId('$id')\">
                        &times;
                    </button>

                    <div class='imagem'>
                        <img class='exib-img' src='../images/".htmlspecialchars($linha['tipo'])."/"
                            .htmlspecialchars($linha['cor']).".png' alt='".htmlspecialchars($linha['nome'])."'>
                    </div>

                    <div class='sobre'>
                        <p class='exib-nome'>".htmlspecialchars($linha['nome'])."</p>
                        <p class='exib-descricao'>".htmlspecialchars($linha['descricao'])."</p>
                    </div>

                    <div class='preco'>
                        <p class='exib-preco'>".htmlspecialchars($linha['preco'])."</p>
                    </div>
                </div>
            ";
        } 
    } 
    else {
        echo "<p>Nenhum produto encontrado.</p>";
        echo "
            <button class='inserir-dados' onclick='inserirDadosPredefinidos()'>
                Clique aqui para inserir novos dados predefinidos
            </button>
            <br>
            <a href='/Minka-Coffee/views/cadastro.php' class='botao-inserir'>
                Ou clique aqui para cadastrar novos dados
            </a>
        ";
    }
} 
catch(PDOException $e) {
    echo "<p>Problemas na realização da Seleção/Impressão...</p>";
}

$conx = null;
?>