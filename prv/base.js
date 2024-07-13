const links = document.querySelectorAll("[data-link]");
const hello = document.querySelector(".hello");
const dropdown = document.querySelector(".dropdown");
const header = document.querySelector("header")

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
},1)

dropdown.addEventListener("click", () => {
    if (!header.classList.contains("dropdown")) {
        header.classList.add("dropdown");
    } else {
        header.classList.remove("dropdown")
    }
})