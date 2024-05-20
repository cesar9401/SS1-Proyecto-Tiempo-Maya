let date = new Date();
const hour = date.getHours();

const inicio = document.getElementById("inicio")

inicio.style.backgroundImage = "url('../img/fondos/"+hour+".png')";

if (hour < 5 || hour > 18) {
    const elements = document.getElementsByClassName("index-col");
    for (let i = 0; i < elements.length; i++) {

        elements[i].style.background = 'rgba(63, 64, 66, 0.7)';
    }
}