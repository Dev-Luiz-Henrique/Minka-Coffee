const data = document.getElementById('data');
const hoje = new Date();
data.textContent = `${hoje.toLocaleDateString('pt-BR')}`;
