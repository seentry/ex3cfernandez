document.addEventListener("DOMContentLoaded", main)

function main() {

    let parrafos = document.getElementsByTagName("p");

    let tamañoOriginal = 1;
    let tamañoActual = tamañoOriginal;
    let incremento = 0.2;

    document.getElementById('paco').addEventListener('mouseover', function() {
        tamañoActual += incremento;
        if (tamañoActual <= tamañoOriginal * 2) {
            this.style.fontSize = tamañoActual + 'em';
            this.style.color = "red";
        } else {
            tamañoActual = tamañoOriginal;
            this.style.color = "blue";
        }
    });
    

}