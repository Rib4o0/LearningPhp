const links = document.querySelectorAll("[data-link]");
const hello = document.querySelector(".hello");
const dropdown = document.querySelector(".dropdown");
const header = document.querySelector("header");
const error = document.querySelector(".error")

links.forEach(link => {
    link.addEventListener("click", () => {
        hello.classList.add("activated");
        setTimeout(() => {
            window.location = link.dataset.link + `?redirected=true`;
        }, 250)
    })
})

setTimeout(() => {
    hello.classList.remove("activated");
    setTimeout(() => {
        hello.classList.remove("right");
    },250)
    setTimeout(() => {
        error.classList.remove("show");
    },3250)
},1)

dropdown.addEventListener("click", () => {
    if (!header.classList.contains("dropdown")) {
        header.classList.add("dropdown");
    } else {
        header.classList.remove("dropdown")
    }
})

// lightMode()

function lightMode() {
    console.log("UR MOTHER IS GAY")
    document.documentElement.style.setProperty('--backround', '#fafaff');
    document.documentElement.style.setProperty('--fainted-background', '#e0e0ff');
    document.documentElement.style.setProperty('--secondary-background', '#cdcde4');
    document.documentElement.style.setProperty('--text', '#000');
}