var item1 = document.querySelector('.geral')
var item2 = document.querySelector('.agenda')
var item3 = document.querySelector('.perfil')
var item4 = document.querySelector('.colegiados')
var item5 = document.querySelector('.calendario')
var item6 = document.querySelector('.download')
var item7 = document.querySelector('.media')

function geral(){
    item1.style.display = "flex"
    item3.style.display = "none"
    item2.style.display = "none"
    item5.style.display = "none"
    item4.style.display = "none"
    item7.style.display = "none"
    item6.style.display = "none"
}

function agenda(){
    item1.style.display = "none"
    item3.style.display = "none"
    item4.style.display = "none"
    item5.style.display = "none"
    item6.style.display = "none"
    item7.style.display = "none"
    item2.style.display = "flex"
}

function perfil(){
    item1.style.display = "none"
    item2.style.display = "none"
    item4.style.display = "none"
    item5.style.display = "none"
    item6.style.display = "none"
    item7.style.display = "none"
    item3.style.display = "flex"
}

function colegiados(){
    item1.style.display = "none"
    item2.style.display = "none"
    item3.style.display = "none"
    item5.style.display = "none"
    item6.style.display = "none"
    item7.style.display = "none"
    item4.style.display = "flex"
}

function calendario(){
    item1.style.display = "none"
    item2.style.display = "none"
    item3.style.display = "none"
    item4.style.display = "none"
    item6.style.display = "none"
    item7.style.display = "none"
    item5.style.display = "flex"
}

function download(){
    item1.style.display = "none"
    item2.style.display = "none"
    item3.style.display = "none"
    item4.style.display = "none"
    item5.style.display = "none"
    item7.style.display = "none"
    item6.style.display = "flex"
}

function media(){
    item1.style.display = "none"
    item2.style.display = "none"
    item3.style.display = "none"
    item4.style.display = "none"
    item5.style.display = "none"
    item6.style.display = "none"
    item7.style.display = "flex"
}
