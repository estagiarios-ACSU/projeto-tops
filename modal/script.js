//Váriaveis referentes ao modal de adicionar
alert(1)
const saveBtn = document.getElementsByClassName('saveBtn');
const modal = document.getElementsByClassName('add-modal');
let column = [['Compromissos','Eixo','Responsável','Observações','Situação'],
['Instituções','Localidade','Natureza','Zona','Endereço'],
['Usuário','Email','Senha','Tipo','Função']
];

//Váriaveis referentes ao modal de editar

const editModal = document.getElementsByClassName('edit-modal');
const editSaveBtn = document.getElementsByClassName('saveBtn-edit');
let perfilInput = document.getElementsByClassName('perfilInput');


// Váriaveis gerais

const searchInput = document.getElementsByClassName('search-input');
const tableBody = document.getElementsByClassName('tableBody');
const addButton = document.getElementsByClassName('btn-add');
const myForm = document.getElementsByClassName('add-form');
const editForm = document.getElementsByClassName('edit-form');
//Define a ação do formulário do modal
let pathForm = 'nenhum';


let selectOption = document.getElementsByClassName('columns-infor-choice');
const tableReference = ['agenda_territorial','perfil_territorial','usuario'];
const tablesNames = ['agenda-','perfil-','admin-'];

//Faz com que os dados da tabela sejam atualizados
async function uploadTable(){

  const tablesReferences = ['compromisso','instituicao','admin'];
  //Trás os dados da tabela para o site por ajax
  for(let g = 0;g < 3;g++){

    let indexSelectOption = column[g].indexOf(selectOption[g].value);
    const searchTerm = searchInput[g].value;
    let ajaxPedido = await fetch(`../table/data.php?search=${searchTerm}&indexSelectOption=${indexSelectOption}&tableReference=${g}`);
    let ajaxResposta = await ajaxPedido.text();
    
    tableBody[g].innerHTML = ajaxResposta;

    //Pega elementos da tabela 
    const row = document.getElementsByClassName(`${tablesNames[g]}tr-perfil`);
    const instituicoes = document.getElementsByClassName(`${tablesNames[g]}instituicao`);
    let perfilInputEdit = document.getElementsByClassName(`${tablesNames[g]}InputEdit`);

    //Adiciona funções nos elementos de editar e deletar da tabela 
    for(let i = 1; i <= row.length;i++){
      const delBtn = document.getElementById(`${tablesNames[g]}delBtn${i}`);
      const editBtn = document.getElementById(`${tablesNames[g]}editBtn${i}`);

      //Adciona a função do botão de deletar
      delBtn.addEventListener('click', async () => {
        Swal.fire({
          title: 'Deseja Realmente Deletar Estes Dados?',
          showDenyButton: true,
          confirmButtonText: 'Sim, Deletar',
          confirmButtonColor:'#2874fc',
          denyButtonText: `Não Deletar`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            const formData = new FormData();
            formData.append(tablesReferences[g],instituicoes[i-1].innerHTML);
          
            const deleteAjax = fetch("../table/del.php", {
              method: "POST",
              body: formData
            }).then(response => response.text()).then(data => {
              console.log(data);
            });
            Swal.fire('Saved!', '', 'success');
          } else if (result.isDenied) {
            Swal.fire('As Mudanças Não Foram Salvas', '', 'info')
          }
        }) //acaba aqui o del

      })

      //Função de editar
      editBtn.addEventListener('click', () => {

        //Faz com que o modal apareça
        editModal[g].style.display = 'flex';


        let lineContent = document.getElementsByClassName(tablesNames[g]+'contentLine'+i);

        let originName = lineContent[0].innerHTML;

        for(let c = 0;c < 6;c++){
          let line1 = document.getElementsByClassName(tablesNames[g]+'line'+i);
          if(perfilInputEdit[c] != 'Admin' && perfilInputEdit[c] != 'Admin Master'){
            perfilInputEdit[c].value = line1[c].innerHTML;
          }
          
          instituicaoOrigin = line1[0].innerHTML;
          
        }

        editSaveBtn[g].addEventListener('click', () => {
          pathForm = 'add';
        })

      })
    }
  
  }
  

  return tableBody.innerHTML;
}

uploadTable();


for(let g = 0;g < 3;g++){
  editForm[g].addEventListener('submit', function(event) {

    console.log('edit');
    let perfilInputEdit = document.getElementsByClassName(`${tablesNames[g]}InputEdit`);

    event.preventDefault();
  
    if(cancelModal){
      console.log('fechado');
    }
    else{
      if(pathForm == 'add'){
        const formData = new FormData(this);
  
        Swal.fire({
          title: 'Deseja Realmente Editar Estes Dados?',
          showDenyButton: true,
          confirmButtonText: 'Sim, Editar',
          denyButtonText: `Não Editar`,
          confirmButtonColor: '#2874fc'
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            fetch('../table/edit.php', {
              method: "POST",
              body: formData
            }).then(response => response.text())
            .then(data => {
                console.log(data); // Exibir a resposta do servidor
          
            })
            .catch(error => {
                console.error("Erro:", error);
            });  
            Swal.fire('Editado!', '', 'success')
          } else if (result.isDenied) {
            Swal.fire('As Mudanças Não Foram Salvas','','error')
          }
        })
        
        
      }
  
      const searchTerm = searchInput.value;
      fetch(`../table/data.php?search=${searchTerm}`)
          .then(response => response.text())
          .then(data => {
  
            tableBody.innerHTML = data;
      });
      
    }
    
    editModal[g].style.display = 'none';
    cancelModal = false;
    pathForm = 'nenhum';
  
    for(let i = 0;i < perfilInputEdit.length;i++){
      if(perfilInputEdit[i] != 'Admin' && perfilInputEdit[i] != 'Admin Master'){
        perfilInputEdit[i].value = "";
      }
      
    }
  
  })
}

for(let h = 0;h < 3;h++){

  addButton[h].addEventListener('click', () => {
    modal[h].style.display = 'flex';
  });

  saveBtn[h].addEventListener('click', () => {
    pathForm = 'add';
    console.log("dados salvos com sucesso");
  });

  myForm[h].addEventListener('submit', function(event) {

  
    event.preventDefault();
    if(cancelModal){
      console.log('fechado');
    }
    else{
      if(pathForm == 'add'){
        const formData = new FormData(this);
        Swal.fire({
            title: 'Deseja Realmente Adicionar Esses Dados Na Tabela?',
            showDenyButton: true,
            confirmButtonText: 'Sim, adicionar!',
            denyButtonText: `Não Adicionar`,
            confirmButtonColor: '#2874fc'
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              let selectAdmin = document.getElementsByClassName('selectAdmin')[0];
              formData.append('admin',selectAdmin.value);
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
              Swal.fire('Adicionado com sucesso!', '', 'success')
            } else if (result.isDenied) {
              Swal.fire('As Mudanças Não Foram Salvas','','error')
            }
          })

          }
    
      }
    modal[h].style.display = 'none';
    cancelModal = false;
    pathForm = 'nenhum';

  })

    //Search Input event is here
    searchInput[h].addEventListener('input', () => {
    
      //Pega qual coluna será a base da pesquisa
      let indexSelectOption = column[h].indexOf(selectOption[h].value);
      const searchTerm = searchInput[h].value;
      fetch(`../table/search-data.php?search=${searchTerm}&indexSelectOption=${indexSelectOption}&tableReference=${tableReference[h]}`)
          .then(response => response.text())
          .then(data => {
            let perfilInputEdit = document.getElementsByClassName(`${tablesNames[h]}InputEdit`);
            tableBody[h].innerHTML = data;

            const row = document.getElementsByClassName(`${tablesNames[h]}tr-perfil`);
            const instituicoes = document.getElementsByClassName(`${tablesNames[h]}instituicao`);
            const tablesReferences = ['compromisso','instituicao','usuario'];
            for(let i = 1;i <= row.length;i++){
            const delBtn = document.getElementById(`${tablesNames[h]}delBtn${i}`);
            const editBtn = document.getElementById(`${tablesNames[h]}editBtn${i}`);

            delBtn.addEventListener('click',() => {
              Swal.fire({
                title: 'Deseja Realmente Deletar Estes Dados?',
                showDenyButton: true,
                confirmButtonText: 'Sim, Deletar',
                confirmButtonColor:'#2874fc',
                denyButtonText: `Não Deletar`,
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  const formData = new FormData();
                  formData.append(tablesReferences[h],instituicoes[i-1].innerHTML);
            
                  const deleteAjax = fetch("../table/del.php", {
                    method: "POST",
                    body: formData
                  }).then(response => response.text()).then(data => {
                    console.log(data);
                  });
                  Swal.fire('Saved!', '', 'success')

                } else if (result.isDenied) {
                  Swal.fire('As Mudanças Não Foram Salvas', '', 'info')
                }
              }) //acaba aqui o del

            })

            editBtn.addEventListener('click', () => {

              console.log('edit');
      
              //Faz com que o modal apareça
              editModal[h].style.display = 'flex';
      
      
              let lineContent = document.getElementsByClassName(tablesNames[h]+'contentLine'+i);
      
              let originName = lineContent[0].innerHTML;
      
              for(let c = 0;c < 6;c++){
                let line1 = document.getElementsByClassName(tablesNames[h]+'line'+i);
                perfilInputEdit[c].value = line1[c].innerHTML;
                instituicaoOrigin = line1[0].innerHTML;
                
              }
      
              editSaveBtn[h].addEventListener('click', () => {
                pathForm = 'add';
              })
      
            })
          }
          })
  
          })
    
  }

document.addEventListener('click', () => {

  uploadTable();
})




let cancelModal = false;

