document.addEventListener("DOMContentLoaded", () => {
  const btnChuchu = document.getElementById('btn-chuchubot');
  const btnFiltros = document.getElementById('btn-filtros');
  const content = document.getElementById('filtro-content');

  const renderFiltros = () => {
    content.innerHTML = `
      <div class="filtro-group">
        <label class="filtro-label">Tipo de Animal</label>
        <div class="select-box">
          <select>
            <option>Perro</option>
            <option>Gato</option>
            <option>Conejo</option>
            <option>Ave</option>
          </select>
        </div>
      </div>

      <div class="filtro-group">
        <label class="filtro-label">Ubicación</label>
        <div class="select-box">
          <select>
            <option>Zulia</option>
            <option>Caracas</option>
            <option>Mérida</option>
          </select>
        </div>
        <button class="location-btn"><i class="fas fa-location-arrow"></i> Usar ubicación actual</button>
      </div>

      <div class="progress-group">
        <label class="filtro-label">Distancia máxima</label>
        <div class="progress-bar">
          <div class="progress-fill"></div>
          <div class="progress-label">
            <i class="fas fa-paw"></i> 12 km
          </div>
        </div>
      </div>

      <div class="filtro-group">
        <label class="filtro-label">Tamaño</label>
        <div class="checkbox-row">
          <label><input type="radio" name="size"><span>S<br>Small</span></label>
          <label><input type="radio" name="size"><span>M<br>Medium</span></label>
          <label><input type="radio" name="size"><span>L<br>Large</span></label>
        </div>
      </div>

      <div class="filtro-group">
        <label class="filtro-label">Raza</label>
        <div class="select-box">
          <select><option>Labrador</option><option>Chihuahua</option></select>
        </div>
      </div>

      <div class="filtro-group">
        <label class="filtro-label">Color</label>
        <div class="select-box">
          <select>
            <option>🐶 Blanco</option>
            <option>🐱 Negro</option>
            <option>🐶 Marrón</option>
          </select>
        </div>
      </div>

      <div class="filtro-group">
        <label class="filtro-label">Género</label>
        <div class="select-box">
          <select><option>Any</option><option>Hembra</option><option>Macho</option></select>
        </div>
      </div>

      <div class="progress-group">
        <label class="filtro-label">Edad</label>
        <div class="progress-bar">
          <div class="progress-fill" style="width:40%;"></div>
          <div class="progress-label" style="left:40%;">
            <i class="fas fa-paw"></i> 4 años
          </div>
        </div>
      </div>

      <button class="btn-aplicar">Aplicar filtros</button>
    `;
  };

  btnChuchu.addEventListener("click", () => {
    btnChuchu.classList.add("active");
    btnFiltros.classList.remove("active");
    content.innerHTML = "";
  });

  btnFiltros.addEventListener("click", () => {
    btnFiltros.classList.add("active");
    btnChuchu.classList.remove("active");
    renderFiltros();
  });

  // Activar filtros por defecto
  renderFiltros();
  btnFiltros.classList.add("active");
  btnChuchu.classList.remove("active");
});
