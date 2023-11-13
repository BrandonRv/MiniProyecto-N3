function cargarImagen() {
    let logo2 = document.getElementById("logo-info");
    //const toggleSpin = document.getElementById("triangulito-spin");
    let logoLocal = '.'+localStorage.getItem("logo") || "../assets/devchallenges.svg";
    logo2.src = logoLocal;

    var modoActual = localStorage.getItem("background-color");
    var iconoModo = document.getElementById("switchInfo");
    var modoTexto = document.getElementById("modoTexto");

    if (modoActual === 'white') {
        iconoModo.classList.remove("fa-solid", "fa-sun", "fa-sm");
        iconoModo.classList.add("fa-solid", "fa-moon", "fa-sm");
        modoTexto.textContent = "Dark Mode";
       // toggleSpin.setAttribute("fill", "black");
    } else if (modoActual === '#252329'){
        modoTexto.textContent = "Light Mode";
        iconoModo.classList.remove("fa-solid", "fa-moon", "fa-sm");
        iconoModo.classList.add("fa-solid", "fa-sun", "fa-sm"); 
      //  toggleSpin.setAttribute("fill", "white");     
    }s

  }
window.addEventListener("load", cargarImagen);

document.documentElement.style.setProperty("--background-color", localStorage.getItem("background-color") || "white");
document.documentElement.style.setProperty("--text-color", localStorage.getItem("text-color") || "#252329");
let logoLocal = localStorage.getItem('logo') || "./assets/devchallenges.svg";
let icono = document.getElementById("switch");

let logo = document.getElementById('logo');
let colorInicial = localStorage.getItem("background-color") || "white";
let colorClaroFondo = "white";
let colorOscuroFondo = "#252329";
let logoClaro = './assets/devchallenges-light.svg';
let logoOscuro = './assets/devchallenges.svg';

if (colorInicial === colorOscuroFondo) {
    icono.classList.remove("fa-solid", "fa-moon", "fa-2x");
    icono.classList.add("fa-solid", "fa-sun", "fa-2x");
    icono.style.color = "#d4a408";
    logo.src = logoLocal;

} else {
    icono.classList.remove("fa-solid", "fa-sun", "fa-2x");
    icono.style.removeProperty("color");
    icono.classList.add("fa-solid", "fa-moon", "fa-2x");
    logo.src = logoLocal;
}

function cambiarModo() {
    let colorActual = getComputedStyle(document.documentElement).getPropertyValue("--background-color");
    let colorClaroFondo = "white";
    let colorOscuroFondo = "#252329";
    let colorClaroTexto = "#252329";
    let colorOscuroTexto = "white";
    let nuevoColorFondo = colorActual === colorClaroFondo ? colorOscuroFondo : colorClaroFondo;
    let nuevoColorTexto = colorActual === colorClaroFondo ? colorOscuroTexto : colorClaroTexto;
    let nuevaRuta = colorActual === colorClaroFondo ? logoClaro : logoOscuro;

    document.documentElement.style.setProperty("--background-color", nuevoColorFondo);
    document.documentElement.style.setProperty("--text-color", nuevoColorTexto);

    localStorage.setItem("background-color", nuevoColorFondo);
    localStorage.setItem("text-color", nuevoColorTexto);
    localStorage.setItem("logo", nuevaRuta);

    if (nuevoColorFondo === colorOscuroFondo) {
        icono.classList.remove("fa-solid", "fa-moon", "fa-2x");
        icono.classList.add("fa-solid", "fa-sun", "fa-2x");
        icono.style.color = "#d4a408";
    } else {
        icono.classList.remove("fa-solid", "fa-sun", "fa-2x");
        icono.style.removeProperty("color");
        icono.classList.add("fa-solid", "fa-moon", "fa-2x");
    }
    logo.src = nuevaRuta; 
}

function textModel() {

    var modoActual = localStorage.getItem("background-color");
    var iconoModo = document.getElementById("switchInfo");
    var modoTexto = document.getElementById("modoTexto");
   // const toggleSpin = document.getElementById("triangulito-spin");

    let logoClaro = '../assets/devchallenges-light.svg';
    let logoOscuro = '../assets/devchallenges.svg';
    let logo2 = document.getElementById("logo-info");


    if (modoActual === '#252329') {
        iconoModo.classList.remove("fa-solid", "fa-sun", "fa-sm");
        iconoModo.classList.add("fa-solid", "fa-moon", "fa-sm");
        modoTexto.textContent = "Dark Mode";
      //  toggleSpin.setAttribute("fill", "black");
        logo2.src = logoOscuro;
    } else if (modoActual === 'white'){
        modoTexto.textContent = "Light Mode";
        iconoModo.classList.remove("fa-solid", "fa-moon", "fa-sm");
        iconoModo.classList.add("fa-solid", "fa-sun", "fa-sm");
      //  toggleSpin.setAttribute("fill", "white");
        logo2.src = logoClaro;      
    }

}

