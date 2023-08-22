//Pega os id da barra de pesquisa e do corpo da tabela.
const searchInput = document.getElementById('searchInput');
const tableBody = document.getElementById('tableBody');

//Adciona um evento que ao carregar a página toda pega os dados do server.
document.addEventListener('DOMContentLoaded', () => {
    const searchTerm = searchInput.value;
    fetch(`data.php?search=${searchTerm}`)
        .then(response => response.text())
        .then(data => {
            tableBody.innerHTML = data;
        });
});

//Adiciona um evento de pesquisa.
searchInput.addEventListener('input', () => {
    const searchTerm = searchInput.value;
    fetch(`data.php?search=${searchTerm}`)
        .then(response => response.text())
        .then(data => {
            tableBody.innerHTML = data;
        });
});
