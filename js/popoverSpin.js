const toggleBar = document.getElementById("toggle");
const toggleSpin = document.getElementById("triangulito-spin");
let spin = false;

function popoverSpin() {

    //toggleBar.classList.toggle("hidden ...");

    spin = (!spin);
    console.log(spin);
    if (spin == true) {
        toggleSpin.style.transform = "rotate(180deg)";
        toggleBar.style.display ="none";
    } else if (spin == false) {
        toggleSpin.style.transform = "rotate(0deg)"; 
        toggleBar.style.display ="block";
    }
  }

