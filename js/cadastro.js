const cores = [
    { name: 'amarelo', value: 'yellow' },
    { name: 'azul',    value: 'blue' },
    { name: 'branco',  value: 'white' },
    { name: 'marrom',  value: 'brown' },
    { name: 'preto',   value: 'black' },
    { name: 'rosa',    value: 'pink' },
    { name: 'roxo',    value: 'purple' },
    { name: 'verde',   value: 'green' },
];   
let tipo = null;

const form = document.getElementById('frm-produtos');
const btnIncluir = document.getElementById('btn-incluir');

const nome = document.getElementById('nome');
const descricao = document.getElementById('descricao');
const preco = document.getElementById('preco');
const selectCores = document.getElementById('cores');
const tipos = document.querySelectorAll('.produto');

const msgErro = document.getElementById('erro');
const erroNome = document.getElementById('erro-nome');
const erroDescricao = document.getElementById('erro-descricao');
const erroPreco = document.getElementById('erro-preco');
const erroCor = document.getElementById('erro-cor');   

const nomeExibicao = document.getElementById('exib-nome');
const descricaoExibicao = document.getElementById('exib-descricao');
const precoExibicao = document.getElementById('exib-preco');
const imgExibicao = document.getElementById('exib-img');

//
// Funções Genéricas
//

// Função genérica para mostrar mensagens de erro
function mostrarErro(campo, mensagem) {
    campo.style.visibility = 'visible';
    msgErro.style.visibility = 'visible';
    msgErro.innerText = mensagem;
}

// Função genérica para esconder mensagens de erro
function esconderErro(campo) {
    campo.style.visibility = 'hidden';
    msgErro.style.visibility = 'hidden';
}

//
// Validações
//

// Função para validar o campo nome
function validarNome(nome) {
    const nomeFormatado = nome.value.trim();
    if (nomeFormatado.length < 3 || nomeFormatado.length > 20) {
        mostrarErro(erroNome, 'O campo \'Nome\' deve ter entre 3 e 20 caracteres');
        return false;
    }
    esconderErro(erroNome);
    return true;
}

// Função para validar o campo descricao
function validarDescricao(descricao) {
    const descricaoFormatada = descricao.value.trim();
    if (descricaoFormatada.length < 5 || descricaoFormatada.length > 60) {
        mostrarErro(erroDescricao, 'O campo \'Descrição\' deve ter entre 5 e 60 caracteres');
        return false;
    }
    esconderErro(erroDescricao);
    return true;
}

// Função para validar o campo preco
function validarPreco(preco) {
    const valorPreco = parseFloat(preco.value.replace(',', '.'));
    if (isNaN(valorPreco) || valorPreco < 0 || valorPreco > 99.99) {
        mostrarErro(erroPreco, 'O campo \'Preço\' deve estar entre R$ 0,00 e R$ 99,99');
        return false;
    }
    esconderErro(erroPreco);
    return true;
}

//
// Atualizações
//

nome.addEventListener('blur', function() {
    if(validarNome(nome)) {
        nomeExibicao.innerText = nome.value.trim();
    }
});

descricao.addEventListener('blur', function() {
    if(validarDescricao(descricao)) descricaoExibicao.innerText = descricao.value.trim();
});

preco.addEventListener('blur', function() {
    if(validarPreco(preco)) precoExibicao.innerText = parseFloat(preco.value).toFixed(2);
});

tipos.forEach(radio => {
    radio.addEventListener('change', () => {
        if (radio.checked) {
            tipo = radio.value;
            selectCores.disabled = false;
            imgExibicao.src = `../images/${tipo}/empty.png`;
        }
    });
});

selectCores.addEventListener('change', function() {
    if (tipo) {
        imgExibicao.src = `../images/${tipo}/${selectCores.options[selectCores.selectedIndex].value}.png`;
        btnIncluir.disabled = false;
    }
});

//
// Formulario
//

function incluir() {
    msgErro.style.visibility = 'hidden';

    if(!validarNome(nome) || !validarDescricao(descricao) || !validarPreco(preco)) return false;

    const selecionada = [...tipos].some(radio => radio.checked);
    if (!selecionada) {
        msgErro.style.visibility = 'visible';
        msgErro.innerText = 'Selecione um tipo de produto!';
        return false;
    }
    
    form.action="../php/incluir.php";
    form.method="POST";
    form.submit();
}

//
// Alterações Gerais
//

// Popular ComboBox
cores.forEach(cor => {
    const novaOpcao = document.createElement('option');
    novaOpcao.value = cor.value;
    novaOpcao.textContent = cor.name;
    selectCores.appendChild(novaOpcao);
});
selectCores.disabled = true;