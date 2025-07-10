function cambiarVista() {
  const app = document.getElementById('app');

  fetch('Views/realojar/prueba.php')
    .then(res => res.text())
    .then(html => {
      app.innerHTML = html;
    })
    .catch(err => {
      app.innerHTML = "<p>Error al cargar la vista. 😢</p>";
      console.error(err);
    });
}
