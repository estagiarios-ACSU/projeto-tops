const searchInput = document.getElementById('searchInput');
const tableBody = document.getElementById('tableBody');
const addButton = document.getElementById('btn-add');
let update = false;
let resposta = false;

addButton.style = "width: 12.5rem;font-size: 1rem;font-weight: 600;color: #fff;cursor: pointer;margin-top: 1.25rem;height: 2.4375rem;text-align:center;border: none;background-size: 300% 100%;border-radius: 3.125rem;moz-transition: all .4s ease-in-out;-o-transition: all .4s ease-in-out;-webkit-transition: all .4s ease-in-out;transition: all .4s ease-in-out;font-weight: 300;background-image: linear-gradient(to right, #2874fc,#5496ec,#1b61e2,#502bb6);box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);";

async function uploadTable1(){
  const searchTerm = searchInput.value;
  let ajaxPedido = await fetch(`../table/data.php?search=${searchTerm}`);
  let ajaxResposta = await ajaxPedido.text();
  tableBody.innerHTML = ajaxResposta;


  const row = document.getElementsByClassName('tr-perfil');
  const instituicoes = document.getElementsByClassName('instituicao-nome');

  for(let i = 1; i <= row.length;i++){
    const delBtn = document.getElementById(`delBtn${i}`);

    delBtn.addEventListener('click', async () => {
      const formData = new FormData();
      formData.append('instituicao',instituicoes[i-1].innerHTML);

      const deleteAjax = fetch("../table/del.php", {
        method: "POST",
        body: formData
      });

      prompt('Deseja mesmo deletar?')
      
      ajaxPedido = await fetch(`../table/data.php?search=${searchTerm}`);
      ajaxResposta = await ajaxPedido.text();
      tableBody.innerHTML = ajaxResposta;

    })
  }
  
}
async function uploadTable(){
  console.log('atualizouuu');
  const searchTerm = searchInput.value;
  let ajaxPedido = await fetch(`../table/data.php?search=${searchTerm}`);
  let ajaxResposta = await ajaxPedido.text();
  tableBody.innerHTML = ajaxResposta;

  const row = document.getElementsByClassName('tr-perfil');
  const instituicoes = document.getElementsByClassName('instituicao-nome');

  for(let i = 1; i <= row.length;i++){
    const delBtn = document.getElementById(`delBtn${i}`);

    delBtn.addEventListener('click', async () => {
      if(prompt('Deseja mesmo deletar?') == 'sim'){
        const formData = new FormData();
        formData.append('instituicao',instituicoes[i-1].innerHTML);
  
        const deleteAjax = fetch("../table/del.php", {
          method: "POST",
          body: formData
        });
  
        
        
        ajaxPedido = await fetch(`../table/data.php?search=${searchTerm}`);
        ajaxResposta = await ajaxPedido.text();
        tableBody.innerHTML = ajaxResposta;
  
      }

    })
  }
  
  return tableBody.innerHTML;
}

document.addEventListener('click', () => {
  console.log(uploadTable());
  update = true;
})


searchInput.addEventListener('input', () => {
    const searchTerm = searchInput.value;
    fetch(`../table/data.php?search=${searchTerm}`)
        .then(response => response.text())
        .then(data => {
            tableBody.innerHTML = data;
        });
});


const closeModalBtn = document.getElementById('closeModalBtn');
const saveBtn = document.getElementById('saveBtn');
const modal = document.getElementById('modal');
const myForm = document.getElementById('myForm');

addButton.addEventListener('click', () => {
  modal.style.display = 'flex';
});

saveBtn.addEventListener('click', () => {
  console.log("dados salvos com sucesso");
});

closeModalBtn.addEventListener('click', () => {
  modal.style.display = 'none';
});

myForm.addEventListener('submit', function(event) {
  event.preventDefault();
  const formData = new FormData(this);

  fetch("../table/add.php", {
    method: "POST",
    body: formData
  }).then(response => response.text())
  .then(data => {
      console.log(data); // Exibir a resposta do servidor

  })
  .catch(error => {
      console.error("Erro:", error);
  });


})

myForm.addEventListener('submit', function(event) {
  event.preventDefault();
  const searchTerm = searchInput.value;
  fetch(`../table/data.php?search=${searchTerm}`)
      .then(response => response.text())
      .then(data => {
          tableBody.innerHTML = data;
      });
  modal.style.display = 'none';
})
