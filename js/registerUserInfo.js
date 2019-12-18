var imgUsu = document.getElementById("imgUsu");
var botao1 = document.getElementById("element_button");
var paragrafo = document.getElementById("p");
var botao2 = document.getElementById("element_button2");
var form = document.getElementById("element_form");

function showImg(){
    imgUsu.style.display = "initial";
    botao1.style.display = "none";
    paragrafo.style.display = "none";
    botao2.style.display = "initial";
}

function showForm(){
    imgUsu.style.display = "none";
    botao2.style.display = "none";
    form.style.display = "block";
}

function changeImgLater(){
    form.style.display = "block";
    botao1.style.display = "none";
    paragrafo.style.display = "none";
    botao2.style.display = "none";
}