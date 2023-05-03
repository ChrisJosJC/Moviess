const back = document.querySelector("#backAnchor")
const front = document.querySelector("#frontAnchor")
const toflip = document.querySelector(".toflip")

toflip.addEventListener("click", e=>{
    if (e.target == front || e.target == back) {
        toflip.classList.toggle("fliped")
    }
})