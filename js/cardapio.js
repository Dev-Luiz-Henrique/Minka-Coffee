function deletarPorId(id) {
    if (!confirm('Tem certeza de que deseja excluir este item?')) return;

    // Enviar uma requisição POST para o servidor
    fetch('../php/deletar.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            id: id
        })
    })
    .then(response => response.text())
    .then(result => {
        alert(result);
        location.reload();
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Ocorreu um erro ao tentar excluir o item.');
    });
}

function inserirDadosPredefinidos() {
    fetch('/Minka-Coffee/php/database/tabelas.php')
        .then(response => response.text())
        .then(data => {
            location.reload();
        })
        .catch(error => console.error('Erro ao inserir dados:', error));
}