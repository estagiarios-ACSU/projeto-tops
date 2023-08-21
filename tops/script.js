const searchInput = document.getElementById('searchInput');
const tableBody = document.getElementById('tableBody');
const addButton = document.getElementById('btn-add');

addButton.style = "width: 12.5rem;font-size: 1rem;font-weight: 600;color: #fff;cursor: pointer;margin-top: 1.25rem;height: 2.4375rem;text-align:center;border: none;background-size: 300% 100%;border-radius: 3.125rem;moz-transition: all .4s ease-in-out;-o-transition: all .4s ease-in-out;-webkit-transition: all .4s ease-in-out;transition: all .4s ease-in-out;font-weight: 300;background-image: linear-gradient(to right, #2874fc,#5496ec,#1b61e2,#502bb6);box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);";

document.addEventListener('DOMContentLoaded', () => {
    const searchTerm = searchInput.value;
    fetch(`../table/data.php?search=${searchTerm}`)
        .then(response => response.text())
        .then(data => {
            tableBody.innerHTML = data;
        });
});

searchInput.addEventListener('input', () => {
    const searchTerm = searchInput.value;
    fetch(`../table/data.php?search=${searchTerm}`)
        .then(response => response.text())
        .then(data => {
            tableBody.innerHTML = data;
        });
});