document.body.addEventListener("click", (e) => {
  if (e.target.className == "trash") {
    document.getElementsByClassName("popup")[0].classList.add("visible");
    this.url = e.target.dataset.href
  }
  if (e.target.className == "btn-option cancel") {
    document.getElementsByClassName("popup")[0].classList.remove("visible");
}
if (e.target.className == "btn-option option-delete") {
    deleteMovie(url)
    document.getElementsByClassName("popup")[0].classList.remove("visible");
  }
});
async function deleteMovie(url) {
    console.log("Starting to delete")
    const res = await fetch(url)
    await res.text()
    console.log(res)
    console.log("Movie deleted.")
    location.reload()
}