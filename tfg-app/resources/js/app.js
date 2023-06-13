// Importación de los módulos
import "./bootstrap";
import Alpine from "alpinejs";
import { Collapse, initTE, Modal, Ripple } from "tw-elements";
// Inicialización para los acordeones cd tailwind elements
initTE({ Collapse, Modal, Ripple });

window.Alpine = Alpine;

Alpine.start();
setDarkMode();
function setDarkMode() {
    // Cambiar de modo oscuro a claro
    if (
        localStorage.theme === "dark" ||
        window.matchMedia("(prefers-color-scheme: dark)").matches
    ) {
        document.documentElement.classList.add("dark");
        document.getElementsByClassName("btn-dark")[0].style.display = "none";
    } else {
        document.documentElement.classList.remove("dark");
        document.getElementsByClassName("btn-light")[0].style.display = "none";
    }
}
// Establece el modo oscuro
function setDarkTheme() {
    // Le añado la clase dark a todos los elementos
    document.documentElement.classList.add("dark");
    // Guardo en el local storage la variable para saber en todo momento en qué modo está
    localStorage.theme = "dark";
    // Escondo y muestro un botón u otro para clicar y cambiar el tema (luna o sol)
    document.getElementsByClassName("btn-dark")[0].style.display = "none";
    document.getElementsByClassName("btn-light")[0].style.display = "block";
}

// Establece el modo claro
function setLightTheme() {
    document.documentElement.classList.remove("dark");
    localStorage.theme = "light";
    document.getElementsByClassName("btn-light")[0].style.display = "none";
    document.getElementsByClassName("btn-dark")[0].style.display = "block";
}

// Evento que disparan los botones de cambiar modo
function onThemeSwitcherItemClick(event) {
    const theme = event.target.dataset.theme;

    if (theme === "system") {
        console.log("hoola");
        localStorage.removeItem("theme");
        setSystemTheme();
    } else if (theme === "dark") {
        setDarkTheme();
    } else {
        setLightTheme();
    }
}
//Obtengo los botones y les asigno el evento
const themeSwitcherItems = document.querySelectorAll("#theme-switcher");
themeSwitcherItems.forEach((item) => {
    item.addEventListener("click", onThemeSwitcherItemClick);
});
