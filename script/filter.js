document.querySelector(".search-bar").addEventListener("keyup", (e) => {
    let word = e.target.value;
    const form = new FormData()
    form.append('word',word)
  fetch("./crud/filter.php", {
    method: "POST",
    body: form,
  })
    .then((res) => res.json())
    .then((data) => {
      console.log(data);

      document.querySelector(".peliculas-cards").innerHTML = "";

      data.forEach((e) => {
        document.querySelector(".peliculas-cards").innerHTML += `
        <article class="article">
                <img loading="lazy" src="${e.imagen}" alt="Banner de ${e.nombre}">
                <div class="data">
                    <h2>${e.nombre}</h2>
                    <h3>Director/a: ${e.director}</h3>
                    <h3>Productor/a: ${e.productora}</h3>
                    <h3>Duracion: ${e.duracion}</h3>
                </div>
            <a href="./pelicula.php?id=${e.ID}" class="button bad">Ver más</a>
        </article>`;
      });
    });
});
