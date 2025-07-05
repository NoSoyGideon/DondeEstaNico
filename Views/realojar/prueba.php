
  <!-- SECCIÓN 1 -->
  <section class="seccion uno">
    <div class="encabezado">
      <div class="texto">
        <h1>Cuéntanos sobre tu mascota 🐾</h1>
        <p class="subtexto">“Queremos conocerla bien para encontrarle el hogar que se merece. No te tomará mucho tiempo.”</p>

        <div class="datos-usuario">
          <p><strong>Nombre:</strong> <?= $_SESSION['nombre'] ?? 'No disponible' ?></p>
          <p><strong>Teléfono:</strong> <?= $_SESSION['telefono'] ?? 'No disponible' ?></p>
          <p><strong>Correo:</strong> <?= $_SESSION['correo'] ?? 'No disponible' ?></p>
          <p><strong>ID:</strong> <?= $_SESSION['id_usuario'] ?? 'No disponible' ?></p>
        </div>
      </div>

      <div class="foto-usuario">
        <img src="<?php echo BASE_URL; ?>assets/images/dieta.jpg" alt="Foto del usuario">
      </div>
    </div>
  </section>

  <!-- SECCIÓN 2 -->
  <section class="seccion dos">
    <div class="formulario-container">
      <!-- Aquí va el formulario más adelante -->
      <p class="placeholder">[ Aquí irá el formulario ]</p>
    </div>

    <div class="botones-navegacion">
      <button class="volver">← Volver</button>
      <button class="siguiente">Siguiente →</button>
    </div>
  </section>