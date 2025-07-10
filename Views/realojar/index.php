
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/hero.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<div id="mensaje1" class="mensaje" style="display: none;"></div>


<?php include_once(__DIR__ . '/../Templates/header.php'); ?>
  <div id="app">
    <!-- Vista Hero -->
    <section class="hero">
      <div class="hero-content">
        <h1 class="hero-title">¿Ya no puedes cuidar a tu mascota?</h1>
        <p class="hero-subtitle">Te ayudamos a encontrarle un nuevo hogar lleno de amor y cuidado.</p>
        <?php if (isset($_SESSION['nombre'])): ?>
        <button class="btn-primary" onclick="cambiarVista()">Iniciar proceso de realojamiento</button>
        <?php else: ?>
        <p>Por favor, inicia sesión para continuar.</p>
        <?php endif; ?>
      </div>
      <div class="hero-image">
        <img src="<?php echo BASE_URL; ?>assets/images/realojar/main.jpeg" alt="Ilustración de mascota feliz">
      </div>
    </section>
  </div>

  <div id="form">
    <?php 
function formatRazasForJs($razasArray) {
    $formattedRazas = [];
    foreach ($razasArray as $raza) {
     
        $formattedRazas[] = [
            'value' => strtolower(str_replace(' ', '_', $raza)), // Convierte "Pastor Alemán" a "pastor_aleman"
            'text' => $raza
        ];
    }
    return $formattedRazas;
}

// Aplicar la función de formato a tus arrays
$razas_perros_formateadas = formatRazasForJs($data['razasPerro']);
$razas_gatos_formateadas = formatRazasForJs($data['razasGato']);

// Ahora sí, codificar a JSON
$raza_perros_json = json_encode($razas_perros_formateadas);
$raza_gatos_json = json_encode($razas_gatos_formateadas);

      ?>

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
      <!-- FORMULARIO DE REALOJAMIENTO DE MASCOTA -->
  <form id="formulario-mascota" >
  <!-- Checkbox de términos -->


  <!-- Texto descriptivo -->
  <h3 class="texto-descriptivo">
    Para postular a <a href="#" class="enlace-primario">Adoptar una mascota</a> necesitas completar algunos campos
  </h3>

  <!-- Primera fila: nombre, tipo, género -->
  <div class="fila-inputs">
    <div class="input-group">
      <label><span class="asterisco">*</span>Nombre de la mascota</label>
      <input type="text" name="nombre" id="nombre" required>
    </div>
    <div class="input-group">
      <label><span class="asterisco">*</span>Tipo</label>
      <select name="tipo" id="tipoSelect">
        <option value="perro">Perro</option>
        <option value="gato">Gato</option>
      </select>
    </div>
    <div class="input-group">
      <label><span class="asterisco">*</span>Género</label>
      <select name="genero">
        <option value=1>Macho</option>
        <option value=0>Hembra</option>
      </select>
    </div>
  </div>



  <!-- Peso, Altura y Colores -->
  <div class="fila-inputs">
    <div class="input-group">
      <label><span class="asterisco">*</span>Peso (kg)</label>
      <input type="number" id="peso" name="peso" step="0.1" min="0.1" max="120.0" required>
    </div>
    <div class="input-group">
      <label><span class="asterisco">*</span>Altura (cm)</label>
      <input type="number" id="altura" name="altura" step="0.1" min="0.1" max="100.0" required>
    </div>
    <div class="input-group">
      <label><span class="asterisco">*</span>Color</label>
      <select name="color">
        <option value="negro">Negro</option>
        <option value="blanco">Blanco</option>
        <option value="marron">Marrón</option>
        <option value="gris">Gris</option>
      </select>
    </div>

<div class="input-group">
      <label><span class="asterisco">*</span>Raza</label>
      <select name="Raza" id="razaSelect">
        <option value="">Selecciona una raza</option>
      </select>
    </div>

  </div>

  <!-- Fecha o Rango de Edad -->
  <div class="fecha-rango">
    <div class="input-group">
      <label>Fecha de nacimiento</label>
      <input type="date" id="fecha-nacimiento" name="fecha-nacimiento">
    </div>
    <div class="rango-edad">
      <div class="input-group">
        <label>Edad mínima</label>
        <input type="number" id="edad-min" name="edad-min"   max="12">
        <small class="ayuda">Si no conoces la edad exacta, puedes estimar.</small>
      </div>
      <div class="input-group">
        <label>Edad máxima</label>
        <input type="number" id="edad-max" name="edad-max"   max="12">
      </div>
      
    </div>
  </div>
<script>
    const razasPerro = <?php echo $raza_perros_json; ?>;
    const razasGato = <?php echo $raza_gatos_json; ?>;
</script>

 <section class="bloque-etiquetas">
  <h3 class="titulo-etiquetas">Selecciona las características que describen a tu mascota <span class="asterisco">*</span></h3>
  <p class="descripcion-etiquetas">
    Estas etiquetas nos ayudarán a conocer mejor su personalidad y a encontrarle el hogar ideal. Puedes seleccionar varias.
  </p>

 <div class="etiquetas-select">
  <?php foreach ($data['etiquetas'] as $nombreEtiqueta => $idEtiqueta):?>
    <span class="etiqueta" data-id="<?= $idEtiqueta ?>">
      <?= htmlspecialchars($nombreEtiqueta) ?>
    </span>
  <?php endforeach; ?>
  <input type="hidden" name="etiquetas" id="etiquetasInput">
</div>
</section>


<section class="seccion-ubicacion">


  <h3 class="titulo-ubicacion">Ubicación de la mascota</h3>
  <p class="descripcion-ubicacion">
    Selecciona el estado y dirección donde se encuentra tu mascota.
  </p>

  <div class="input-group">
 
    <label for="estadoSelect"><span class="asterisco">*</span>Selecciona un Estado:</label>
    <select name="estado" id="estadoSelect">
    <option value="">Selecciona un estado...</option>
    <option value="Amazonas">Amazonas</option>
    <option value="Anzoátegui">Anzoátegui</option>
    <option value="Apure">Apure</option>
    <option value="Aragua">Aragua</option>
    <option value="Barinas">Barinas</option>
    <option value="Bolívar">Bolívar</option>
    <option value="Carabobo">Carabobo</option>
    <option value="Cojedes">Cojedes</option>
    <option value="Delta Amacuro">Delta Amacuro</option>
    <option value="Dependencias Federales">Dependencias Federales</option>
    <option value="Distrito Capital">Distrito Capital</option>
    <option value="Falcón">Falcón</option>
    <option value="Guárico">Guárico</option>
    <option value="La Guaira">La Guaira</option>
    <option value="Lara">Lara</option>
    <option value="Mérida">Mérida</option>
    <option value="Miranda">Miranda</option>
    <option value="Monagas">Monagas</option>
    <option value="Nueva Esparta">Nueva Esparta</option>
    <option value="Portuguesa">Portuguesa</option>
    <option value="Sucre">Sucre</option>
    <option value="Táchira">Táchira</option>
    <option value="Trujillo">Trujillo</option>
    <option value="Yaracuy">Yaracuy</option>
    <option value="Zulia">Zulia</option>
</select>
  </div>

  <div class="input-group">
    <label><span class="asterisco">*</span>Dirección</label>
    <textarea name="direccion" rows="4" placeholder="Cuéntanos donde se encuentra tu mascota..." required></textarea>
  </div>
</section>





<section class="seccion-explicativa">
  <label >Fotos</label>
  <p class="texto-gris">
    Esto nunca será visible para el público y solo se compartirá con el adoptante cuando completes el proceso de realojamiento. Por tu seguridad, te recomendamos tachar cualquier información personal en los documentos.
  </p>

  <p class="texto-verde">
    El formato de imagen debe ser (.jpg, .png, .jpeg).<br>
    Las dimensiones deben ser cuadradas, con 600 x 600 píxeles.<br>
    El tamaño máximo y mínimo de la imagen es 1024 KB y 240 KB respectivamente.
  </p>
</section>



   
<div class="fotos-lista">
 <div class="upload-container">
    <label for="fileInput" class="custom-upload-button">
      <span class="upload-label">1.Main</span>
      <svg class="camera-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3l2-3h8l2 3h3a2 2 0 0 1 2 2z"/>
        <circle cx="12" cy="13" r="4"/>
      </svg>
      <img id="preview-image" alt="Preview style="display: none;" />
    </label>
    <input type="file" id="fileInput" name="main" accept="image/*" hidden>
  </div>

  <div class="upload-container">
    <label for="fileInput-2" class="custom-upload-button">
      <span class="upload-label">2.Otra</span>
      <svg class="camera-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3l2-3h8l2 3h3a2 2 0 0 1 2 2z"/>
        <circle cx="12" cy="13" r="4"/>
      </svg>
      <img id="preview-image-2" alt="Preview style="display: none;" />
    </label>
    <input type="file" id="fileInput-2" name="file-2" accept="image/*" hidden>
  </div>


  <div class="upload-container">
    <label for="fileInput-3" class="custom-upload-button">
      <span class="upload-label">3.Otra</span>
      <svg class="camera-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3l2-3h8l2 3h3a2 2 0 0 1 2 2z"/>
        <circle cx="12" cy="13" r="4"/>
      </svg>
      <img id="preview-image-3" alt="Preview style="display: none;" />
    </label>
    <input type="file" id="fileInput-3" name="file-3" accept="image/*" hidden>
  </div>
  <div class="upload-container">
    <label for="fileInput-4" class="custom-upload-button">
      <span class="upload-label">4.Otra</span>
      <svg class="camera-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3l2-3h8l2 3h3a2 2 0 0 1 2 2z"/>
        <circle cx="12" cy="13" r="4"/>
      </svg>
      <img id="preview-image-4" alt="Preview style="display: none;" />
    </label>
    <input type="file" id="fileInput-4" name="file-4" accept="image/*" hidden>







</div>

  <!-- Descripción -->
  <div class="input-group">
    <label><span class="asterisco">*</span>Descripción</label>
    <textarea name="descripcion" rows="4" placeholder="Cuéntanos más sobre tu mascota..." required></textarea>
  </div>



</form>

    </div>
  <div class="terminos">
    <label>
      <input type="checkbox" id="check-terminos">
      <span>
        He leído y acepto los <a href="#" class="enlace-primario">Términos y Política de Privacidad</a>
      </span>
    </label>
  </div>
    <div class="botones-navegacion">
      <button class="volver" onclick="cambiarVista()">← Volver</button>
      <button class="siguiente" onclick="success_pantalla()">Siguiente →</button>
    </div>
  </section>

</div>


<div id="success" >

<section class="pagina-exito">
  <h1 class="titulo-exito">Thanks for submitting! 🎉</h1>

  <p class="mensaje-exito">¡Gracias por confiar en nosotros!</p>
  <p class="detalle-exito">
    Hemos recibido tu solicitud. Nuestro equipo se pondrá en contacto contigo en las próximas horas para coordinar la recogida.
  </p>

  <div class="imagen-exito">
    <img src="<?php echo BASE_URL; ?>assets/images/realojar/success.svg" alt="Mascota feliz con su nueva familia">
  </div>


    <div class="botones-navegacion">
      <button class="siguiente" onclick="cambiarVista()">Ver Perfil→</button>
    </div>
</section>

</div>








<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>


  <script>


function mostrarMensaje(texto, color = '#5D4FC4') {
  const mensaje = document.getElementById('mensaje1');
  mensaje.style.backgroundColor = color;
  mensaje.textContent = texto;
  mensaje.style.display = 'block';

  setTimeout(() => {
    mensaje.style.display = 'none';
  }, 3500);
}

  const input = document.getElementById('fileInput');
  const preview = document.getElementById('preview-image');
const input2 = document.getElementById('fileInput-2');
const preview2 = document.getElementById('preview-image-2');
const input3 = document.getElementById('fileInput-3');
const preview3 = document.getElementById('preview-image-3');
const input4 = document.getElementById('fileInput-4');
const preview4 = document.getElementById('preview-image-4');


  const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
const minSize = 240 * 1024; // 240 KB
const maxSize = 1024 * 1024; // 1024 KB


input2.addEventListener('change', function () {
    const file = this.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview2.src = e.target.result;
        preview2.style.display = 'block';
      };
      reader.readAsDataURL(file);
     if(!validarInputImagen("fileInput-2")){
        preview2.style.display = 'none';
        preview2.src = '';
     }
    } else {
      preview2.style.display = 'none';
      preview2.src = '';
    }
    
  });
  input3.addEventListener('change', function () {
    const file = this.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview3.src = e.target.result;
        preview3.style.display = 'block';
      };
      reader.readAsDataURL(file);
      if(!validarInputImagen("fileInput-3")){
preview3.style.display = 'none';
      preview3.src = '';
      }
    } else {
      preview3.style.display = 'none';
      preview3.src = '';
    }
  });
  input4.addEventListener('change', function () {
    const file = this.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview4.src = e.target.result;
        preview4.style.display = 'block';
      };
      reader.readAsDataURL(file);
      if(!validarInputImagen("fileInput-4")){
preview4.style.display = 'none';
      preview4.src = '';
      }
    } else {
      preview4.style.display = 'none';
      preview4.src = '';
    }
  });

  input.addEventListener('change', function () {
    const file = this.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(file);
      if(!validarInputImagen("fileInput")){
        preview.style.display = 'none';
        preview.src = '';
      }
    } else {
      preview.style.display = 'none';
      preview.src = '';
    }
  });



fileInput.addEventListener("change", function () {
  const file = this.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = function (e) {
    previewImg.src = e.target.result;
    previewImg.style.display = "block";
  };
  reader.readAsDataURL(file);
});
// Comportamiento de limpieza entre fecha y edad
const fechaInput = document.getElementById("fecha-nacimiento");
const edadMin = document.getElementById("edad-min");
const edadMax = document.getElementById("edad-max");

fechaInput.addEventListener("input", () => {
  if (fechaInput.value) {
    edadMin.value = "";
    edadMax.value = "";
  }
});

[edadMin, edadMax].forEach(el => {
  el.addEventListener("input", () => {
    if (el.value) {
      fechaInput.value = "";
    }
  });
});


    function cambiarVista() {
            const seccionVisible = document.getElementById('app');
            const seccionOculta = document.getElementById('form');



            // Verifica el estado actual de la sección visible
            if (seccionVisible.style.display === 'none') {
                // Si está oculta, la mostramos y ocultamos la otra
                seccionVisible.style.display = 'block'; // O 'flex', 'grid', dependiendo de cómo la quieras mostrar
                seccionOculta.style.display = 'none';
            } else {
                // Si está visible, la ocultamos y mostramos la otra
                seccionVisible.style.display = 'none';
                seccionOculta.style.display = 'block'; // O 'flex', 'grid'
            }
        }

    function success_pantalla() {


      
    const checkTerminos = document.getElementById('check-terminos');
    const seccionVisible = document.getElementById('success');
    const seccionOculta = document.getElementById('form');
        const formElement = document.getElementById('formulario-mascota'); // Make sure this ID matches your form
    if (!formElement) {
        console.error("Error: The form element with ID 'formulario-mascota' was not found.");
        return;
    }  
    const etiquetasSeleccionadas = Array.from(document.querySelectorAll('.etiqueta.seleccionada'));
const ids = etiquetasSeleccionadas.map(et => et.dataset.id);
document.getElementById('etiquetasInput').value = ids.join(',');

    const formData = new FormData(formElement);


    // Validar si se aceptaron los términos
    if (!checkTerminos.checked) {
        mostrarMensaje("Debes aceptar los términos y condiciones para continuar.");
        return;
    }

    // Validar campos del formulario
    if (!validarCampos()) {
        return;
    }




  
    // --- END OF MISSING PART ---

    // Mostrar/ocultar pantallas según estado
    if (seccionVisible.style.display === 'none') {


        fetch('<?= BASE_URL ?>realojar/cargar', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            // Check if the request was successful (status 200-299)
            if (!response.ok) {
                // If the server responded with an error status (e.g., 400, 500)
                // Try to read the error message from the response body
                return response.text().then(text => {
                    throw new Error(`Server responded with status ${response.status}: ${text}`);
                });
            }
            return response.text(); // Or response.text() if your server sends plain text
        })
        .then(data => {
            // Handle successful response from the server
            console.log("Success:", data);
            // Assuming the upload was successful, then switch screens
            seccionVisible.style.display = 'block';
            seccionOculta.style.display = 'none';
        })
        .catch(err => {
            console.error("Fetch Error:", err);
            if (errorDiv) {
                errorDiv.innerHTML = `❌ Error al comunicarse con el servidor: ${err.message || err}.`;
                errorDiv.classList.remove('hidden');
            }
        });

    } else {
      

        seccionVisible.style.display = 'none';
        seccionOculta.style.display = 'block';
    }
}


  document.querySelectorAll('.etiqueta').forEach(etiqueta => {
    etiqueta.addEventListener('click', () => {
      etiqueta.classList.toggle('seleccionada');
    });
  });


document.addEventListener('DOMContentLoaded', function() {
  const tipoSelect = document.getElementById('tipoSelect');
  const razaSelect = document.getElementById('razaSelect');

  // Creamos un objeto para mapear el tipo de animal a su lista de razas
  // Las variables razasPerro y razasGato ya están definidas gracias al PHP
  const razasPorTipo = {
    perro: razasPerro,
    gato: razasGato
  };

  // Función que se encarga de actualizar el select de razas
  function actualizarRazas() {
    const tipoSeleccionado = tipoSelect.value;
    // Obtenemos el array de razas correspondiente al tipo seleccionado
    // Si no hay razas para el tipo (o si tipoSeleccionado es algo inesperado), usamos un array vacío
    const razas = razasPorTipo[tipoSeleccionado] || [];

    // Limpiamos todas las opciones actuales del select de raza
    razaSelect.innerHTML = '';

    // Agregamos las nuevas opciones al select de raza
    if (razas.length === 0) {
      // Si no hay razas para el tipo seleccionado, mostramos una opción por defecto
      const defaultOption = document.createElement('option');
      defaultOption.value = '';
      defaultOption.text = 'No hay razas disponibles para este tipo';
      defaultOption.disabled = true; // No se puede seleccionar
      defaultOption.selected = true; // Aparece seleccionada por defecto
      razaSelect.appendChild(defaultOption);
    } else {
      // Iteramos sobre el array de razas y creamos un <option> por cada una
      razas.forEach(raza => {
        const option = document.createElement('option');
        option.value = raza.text; // El valor real que se enviará en el formulario
        option.text = raza.text;   // El texto visible para el usuario
        razaSelect.appendChild(option);
      });
    }
  }

  // Escuchamos el evento 'change' en el select de 'Tipo'
  // Cada vez que el usuario cambie la selección, se ejecutará actualizarRazas()
  tipoSelect.addEventListener('change', actualizarRazas);

  // Llamamos a la función una vez al cargar la página.
  // Esto asegura que el select de 'Raza' esté lleno con las opciones correctas
  // desde el principio, basándose en la opción de 'Tipo' seleccionada por defecto.
  actualizarRazas();
});





function validarCampos() {
    let esValido = true;
    let mensaje = "";



    // Validar nombre de mascota
    if (!validarNombreMascota()) {
        esValido = false;
        mensaje += "El nombre de la mascota no es válido. Solo se permiten letras y espacios, entre 2 y 30 caracteres.\n";
    }

        const inputPeso = document.getElementById('peso');
    const valorPeso = parseFloat(inputPeso.value);
    if (isNaN(valorPeso) || valorPeso < 0.1 || valorPeso > 120) {
        esValido = false;
        mensaje += "Por favor ingresa un peso válido (entre 0.1 y 120 kg).\n";
    }

    // --- Altura ---
    const inputAltura = document.getElementById('altura');
    const valorAltura = parseFloat(inputAltura.value);
    if (isNaN(valorAltura) || valorAltura < 0.1 || valorAltura > 100) {
        esValido = false;
        mensaje += "Por favor ingresa una altura válida (entre 0.1 y 100 cm).\n";
    }


  const inputImagen = document.getElementById('fileInput');
    if (!inputImagen.files || inputImagen.files.length === 0) {
        esValido = false;
        mensaje += "Debes subir al menos una imagen principal de la mascota.\n";
    }




    // Puedes añadir más validaciones aquí para otros campos si los necesitas

    if (!esValido) {
        mostrarMensaje(mensaje); // Puedes reemplazar esto con un sistema de notificaciones si lo tienes
    }

    return esValido;
}

function validarNombreMascota() {
    const inputNombre = document.getElementById('nombre');
    const regex = /^[A-Za-zÁÉÍÓÚÜÑáéíóúüñ\s]{2,30}$/;
    return regex.test(inputNombre.value.trim());
}

function validarInputImagen(idDelInput) {
  const validExtensions = ['jpg', 'jpeg', 'png'];
  const minSizeKB = 240;
  const maxSizeKB = 1024;
  const requiredWidth = 600;
  const requiredHeight = 600;

  const input = document.getElementById(idDelInput);
  const file = input.files[0];

  if (!file) return; // si no hay archivo, salir

  const extension = file.name.split('.').pop().toLowerCase();
  const fileSizeKB = file.size / 1024;

  if (!validExtensions.includes(extension)) {
    mostrarMensaje(`El archivo en "${idDelInput}" no es válido (.jpg, .jpeg, .png).`);
    input.value = '';
    return false;
  }

  if (fileSizeKB < minSizeKB || fileSizeKB > maxSizeKB) {
    mostrarMensaje(`El archivo en "${idDelInput}" debe pesar entre 240 KB y 1024 KB.`);
    input.value = '';
    return false;
  }

  const img = new Image();
  const reader = new FileReader();

  reader.onload = function (e) {
    img.src = e.target.result;

    img.onload = function () {
      if (img.width !== requiredWidth || img.height !== requiredHeight) {
        mostrarMensaje(`La imagen en "${idDelInput}" debe tener 600x600 píxeles.`);
        input.value = '';
        return false;
      }
    };
  };

  reader.readAsDataURL(file);
  return true;
}





    </script>
</body>

</html>