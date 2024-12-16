<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>minka</title>
    <link href="../css/estilos.css" rel="stylesheet"/>        
    <link href="../css/cadastro.css" rel="stylesheet"/>
    <link rel="icon" href="../images/icon.png">
</head>
<body>
    <?php include './template/header.php'; ?>

    <main>
        <h2>CADASTRO DE PRODUTO</h2> 
        <form id="frm-produtos"> 
            <div class="dados">
                <div>
                    <div class="campo">
                        <label for="nome">nome:</label>
                        <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" autofocus/>
                        <span class="msg-erro" id="erro-nome" >NOME INVÁLIDO!</span>
                    </div>

                    <div class="campo">
                        <label for="descricao">descrição:</label>
                        <input type="text" id="descricao" name="descricao" placeholder="Digite a descrição do produto"/>
                        <span class="msg-erro" id="erro-descricao" >DESCRIÇÃO INVÁLIDA!</span>
                    </div>

                    <div class="campo">
                        <label for="preco">preço:</label>
                        <input type="number" id="preco" name="preco" placeholder="Digite o preço do produto" min="0" max="99"/>
                        <span class="msg-erro" id="erro-preco" >PREÇO INVÁLIDO!</span>
                    </div>
                </div>

                <div>
                    <div class="campo">
                        <label for="cores">cor:</label>
                        <select id="cores" name="cores">
                            <option value="" disabled selected hidden>Selecione uma cor</option>
                        </select>
                        <span class="msg-erro" id="erro-cor" >COR INVÁLIDA!</span>
                    </div>
                    
                    <div class="tipo" name="tipo">
                        <p>
							<input class="produto" id="beb_quente" name="produto" type="radio" value="cup" />
							<label for="beb_quente">bebida quente</label>
						</p>
                        <p>
							<input class="produto" id="beb_fria" name="produto" type="radio" value="glass"/>
							<label for="beb_fria">bebida fria</label>
						</p>
                        <p>
							<input class="produto" id="doce" name="produto" type="radio" value="cake" />
							<label for="doce">doce</label>
						</p>
                    </div>
                </div>
            </div>

            <div class="exibicao">
                <div class="imagem">
                    <img id="exib-img" src="../images/logo.png">
                </div>

                <div class="sobre">
                    <p id="exib-nome">nome</p>
                    <p id="exib-descricao">descrição</p>
                </div>
                
                <div class="preco">
                    <p id="exib-preco">00,00</p>
                </div>

                <div class="botao">
                    <button id="btn-incluir" type="button" onclick="incluir()" disabled >incluir</button>
                </div>
            </div>
        </form>

        <div class="mensagem">
            <span class="msg-erro" id="erro">Preencha os campos obrigatórios!</span>
        </div>
    </main>

    <?php include './template/footer.php'; ?>
    <script src="../js/cadastro.js"></script>
</body>
</html>