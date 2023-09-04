
//SCRIPT DO MODAL//
const abrirCoisaButton = document.querySelector("#abrir-coisa");
const fecharCoisaButton = document.querySelector("#fechar-coisa");
let modal1 = document.querySelector("#modal1");
const fade = document.querySelector("#fade");

const toggleModal = () => {
  modal1.classList.toggle("hide");
  fade.classList.toggle("hide");
};

[abrirCoisaButton, fecharCoisaButton, fade].forEach((el) => {
  el.addEventListener("click", () => toggleModal());
});

//SCRIPT DO BOTÃO DE FILE//
document.querySelector('#file').addEventListener('change', function(){
    document.querySelector('.text').textContent = this.files[0].name;
  })