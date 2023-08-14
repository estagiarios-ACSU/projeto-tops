/*const fetchSvg = (image) => {
    fetch(image.src)
        .then((response) => response.text())
        .then((response) => {
            const span = document.createElement('span');
            span.innerHTML = response;
            const inlineSvg = span.getElementsByTagName('svg')[0];
            image.parentNode.replaceChild(inlineSvg, image);
            return true;
        })
};*/


/*==== SCROLL ====*/

window.sr = ScrollReveal({reset: true});

sr.reveal('.container')
sr.reveal('.distritos', {duration: 1500})
sr.reveal('.container-msg', {duration: 1500})
sr.reveal('.top_1' , {duration: 1500})
sr.reveal('#text-test' , {duration: 1400})
sr.reveal('.hamburger-menu' , {duration: 200})

/*====TEXT ANIMATION====*/

var string = "Produtivos";
var array = string.split("");
var timer;

function frameLooper () {
  if (array.length > 0) {
    document.getElementById("territorio-span").innerHTML += array.shift();
  } else {
    clearTimeout(timer);
      }
  loopTimer = setTimeout('frameLooper()',70);
}
frameLooper();

/*====BUTTON TO TOP====*/

let topBtn = document.querySelector(".top-btn");
topBtn.onclick = () => window.scrollTo({ top: 0, behavior: "smooth" });
window.onscroll = () => window.scrollY > 500 ? topBtn.style.opacity = 1 : topBtn.style.opacity = 0;

/*====EXIBIR SECTION=====*/

var item1 = document.querySelector('.agenda')
var item2 = document.querySelector('.geral')

function clicou(){
  item1.style.display = "none"
  item2.style.display = "block"
  alert()
}

function perfil(){
    items1.style.display = "flex"
    items2.style.display = "none"
    items3.style.display = "none"
}

function starPlus(){
    items1.style.display = "none"
    items2.style.display = "none"
    items3.style.display = "flex"
}



