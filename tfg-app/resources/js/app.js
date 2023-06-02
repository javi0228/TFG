import "./bootstrap";

import Alpine from "alpinejs";

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

function setDarkTheme() {
    document.documentElement.classList.add("dark");
    localStorage.theme = "dark";
    document.getElementsByClassName("btn-dark")[0].style.display = "none";
    document.getElementsByClassName("btn-light")[0].style.display = "block";
}

function setLightTheme() {
    document.documentElement.classList.remove("dark");
    localStorage.theme = "light";
    document.getElementsByClassName("btn-light")[0].style.display = "none";
    document.getElementsByClassName("btn-dark")[0].style.display = "block";
}

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

const themeSwitcherItems = document.querySelectorAll("#theme-switcher");
themeSwitcherItems.forEach((item) => {
    item.addEventListener("click", onThemeSwitcherItemClick);
});
