document.addEventListener('DOMContentLoaded', () => {
    const searchTerm = searchInput.value;
    fetch(`../table/data-user.php?search=${searchTerm}`)
        .then(response => response.text())
        .then(data => {
            tableBody.innerHTML = data;
        });
});

//Adiciona um evento de pesquisa.
searchInput.addEventListener('input', () => {
    const searchTerm = searchInput.value;
    fetch(`../table/data-user.php?search=${searchTerm}`)
        .then(response => response.text())
        .then(data => {
            tableBody.innerHTML = data;
        });
});
