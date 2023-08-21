const searchInput = document.getElementById('searchInput');
const tableBody = document.getElementById('tableBody');

document.addEventListener('DOMContentLoaded', () => {
    const searchTerm = searchInput.value;
    fetch(`data.php?search=${searchTerm}`)
        .then(response => response.text())
        .then(data => {
            tableBody.innerHTML = data;
        });
});

searchInput.addEventListener('input', () => {
    const searchTerm = searchInput.value;
    fetch(`data.php?search=${searchTerm}`)
        .then(response => response.text())
        .then(data => {
            tableBody.innerHTML = data;
        });
});