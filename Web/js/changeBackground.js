let date = new Date();
const hour = date.getHours();

const inicio = document.getElementById("inicio")

inicio.style.backgroundImage = "url('../img/fondos/"+hour+".png')";