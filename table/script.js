//Pega os id da barra de pesquisa e do corpo da tabela.
const searchInput = document.getElementsByClassName('search-input');
const tableBody = document.getElementsByClassName('tableBody');
let column = [['Compromissos','Eixo','Responsável','Observações','Situação'],['Instituções','Localidade','Natureza','Zona','Endereço']];
let selectOption = document.getElementsByClassName('columns-infor-choice');
//Adciona um evento que ao carregar a página toda pega os dados do server.

for(let h = 0;h < 2;h++){
    document.addEventListener('DOMContentLoaded', () => {
        const searchTerm = searchInput[h].value;
        fetch(`../table/data-user.php?search=${searchTerm}&tableReference=${h}`)
            .then(response => response.text())
            .then(data => {
                tableBody[h].innerHTML = data;
            });
    });
    
    //Adiciona um evento de pesquisa.
    searchInput[h].addEventListener('input', () => {
        let indexSelectOption = column[h].indexOf(selectOption[h].value);
        const searchTerm = searchInput[h].value;
        fetch(`../table/data-user.php?search=${searchTerm}&indexSelectOption=${indexSelectOption}&tableReference=${h}`)
            .then(response => response.text())
            .then(data => {
                tableBody[h].innerHTML = data;
            });
    });
}

