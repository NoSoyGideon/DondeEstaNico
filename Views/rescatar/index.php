
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/edit.css">
      <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/admin.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
       <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              'purple-main': '#675BC8',
              'purple-dark': '#2E256F',
              'purple-light': '#f3f0ff',
              'purple-text': '#3d3477',
              'black': '#0C0C0C',
              'green-main': '#0A453A'
            }
          }
        }
      }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>



<body>
  <div id="mensaje1" class="mensaje" style="display: none;"></div>
<div class="flex h-screen overflow-hidden">
    <aside >
  <?php include_once(__DIR__ . '/../Templates/sidebar.php'); ?>


  <?php 
  
    // 1. Get the pet ID from the URL
    $petId = isset($_GET['id']) ? (int)$_GET['id'] : null;
    $mascota = $data['mascotas'] ?? null;
    $foto = $data['fotos'][0]['url_foto'] ?? null;
    $foto2 = $data['fotos'][1]['url_foto'] ?? null;
    $foto3 = $data['fotos'][2]['url_foto'] ?? null;
    $foto4 = $data['fotos'][3]['url_foto'] ?? null;

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


    $razas_perros_formateadas = formatRazasForJs($data['razasPerro']);
    $razas_gatos_formateadas = formatRazasForJs($data['razasGato']);


    $raza_perros_json = json_encode($razas_perros_formateadas);
    $raza_gatos_json = json_encode($razas_gatos_formateadas);

      

 
  ?>
  </aside>


<main class="flex-1 overflow-y-auto p-6 bg-white">
    
  <section class="seccion uno">
    <button class="volver" onclick="cancelar()">← Cancelar </button>
      <div class="encabezado">
      <div class="texto">
                <h1>Datos de tu mascota registrada 🐾</h1>
        <p class="subtexto">"Estos son los detalles de tu compañero peludo. Revisa que todo esté correcto o edita si es necesario."
        <div class="datos-usuario">
         <p><strong>Estado:</strong> <span class="estado-adopcion"><?= $mascota['estado_adopcion'] ?? 'En proceso' ?></span></p>
        </div>
      </div>

      <div class="foto-mascota">
        <img src="<?= $foto ?? BASE_URL.$foto ?>" alt="Foto de la mascota">
        <div class="badge-adopcion">En adopción</div>
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
    Edita algo no correcto
    </h3>

  <!-- Primera fila: nombre, tipo, género -->
  <div class="fila-inputs">
    <div class="input-group">
      <label><span class="asterisco">*</span>Nombre de la mascota</label>
      <input type="text" name="nombre" id="nombre"  required>

    </div>
    <div class="input-group">
      <label><span class="asterisco">*</span>Tipo</label>
      <select name="tipo" id="tipoSelect">
          <option value="">Selecciona un tipo...</option>
          <option value="perro">Perro</option>
          <option value="gato">Gato</option>

      </select>
    </div>
    <div class="input-group">
      <label><span class="asterisco">*</span>Género</label>
      <select name="genero">
          <option value="">Selecciona un género...</option>
          <option value="1">Macho</option>
          <option value="0">Hembra</option>

      </select>
    </div>
  </div>



  <!-- Peso, Altura y Colores -->
  <div class="fila-inputs">
    <div class="input-group">
      <label><span class="asterisco">*</span>Peso (kg)</label>
      <input type="number" id="peso" name="peso"  step="0.1" min="0.1" max="120.0" required>
    </div>
    <div class="input-group">
      <label><span class="asterisco">*</span>Altura (cm)</label>
      <input type="number" id="altura" name="altura" step="0.1" min="0.1" max="100.0" required>
    </div>
    <div class="input-group">
      <label><span class="asterisco">*</span>Color</label>
      <select name="color">
        <option value="Negro">⚫ Negro</option>
        <option value="Blanco">⚪ Blanco</option>
        <option value="Marrón">🟤 Marrón</option>
        <option value="Gris">⚙️ Gris</option>
        <option value="Beige">🟡 Beige</option>
        <option value="Dorado">🟠 Dorado</option>
        <option value="Canela">🟫 Canela</option>
        <option value="Crema">🤍 Crema</option>
        <option value="Rojizo">🔴 Rojizo</option>
        <option value="Atigrado">🟤⚫ Atigrado</option>
        <option value="Blanco con Negro">⚪⚫ Blanco con Negro</option>
        <option value="Blanco con Marrón">⚪🟤 Blanco con Marrón</option>
        <option value="Negro con Marrón">⚫🟤 Negro con Marrón</option>
        <option value="Gris con Blanco">⚙️⚪ Gris con Blanco</option>
        <option value="Manchado">🔳 Manchado</option>
        <option value="Tricolor">⚪⚫🟤 Tricolor</option>
      </select>
    </div>



    <div class="input-group">
        <label><span class="asterisco">*</span>Raza</label>
        <select name="Raza" id="razaSelect">
        </select>
      </div>

    </div>



    <!-- Fecha o Rango de Edad -->
    <div class="fecha-rango">


      <div class="componente">
        <div class="input-group">
          <label>Fecha de nacimiento</label>

        <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" >

        </div>
      </div>
      <div class="componente">
        <div class="input-group">

            <label>Edad mínima</label>
            <input type="number" id="edad-min" name="edad-min"  max="12">


            <label>Edad máxima</label>
            <input type="number" id="edad-max" name="edad-max"  max="12">
          </div>
      </div>

    </div>



  


  <section class="seccion-ubicacion">
    <h3 class="titulo-etiquetas">  Ubicación de la mascota<span class="asterisco">*</span></h3>
      <p class="descripcion-etiquetas">
        Selecciona el estado y dirección donde se encuentra tu mascota.a.
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
      <img id="preview-image" alt="Preview" style="display: none;" />
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
      <img id="preview-image-2" alt="Preview" style="display: none;" />
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
      <img id="preview-image-3" alt="Preview" style="display: none;" />
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
      <img id="preview-image-4" alt="Preview" style="display: none;" />
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

    <div class="botones-navegacion">
     
      <button class="siguiente" onclick="success_pantalla()">Registrar</button>
    </div>
  </section>

      </main>

</div>

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

      } else {
        preview4.style.display = 'none';
        preview4.src = '';
      }

      console.log("Archivo de entrada 4 actualizado:", this.files);
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

      } else {
        preview.style.display = 'none';
        preview.src = '';
      }

      console.log("Archivo de entrada 1 actualizado:", this.files);
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


    function cancelar() {
        window.location.href = '<?= BASE_URL ?>adminMascotas';
        }

    function success_pantalla() {


      


      const formElement = document.getElementById('formulario-mascota'); // Make sure this ID matches your form
      if (!formElement) {
          console.error("Error: The form element with ID 'formulario-mascota' was not found.");
          return;
      }  
      const etiquetasSeleccionadas = Array.from(document.querySelectorAll('.etiqueta.seleccionada'));
      const ids = etiquetasSeleccionadas.map(et => et.dataset.id);
      document.getElementById('etiquetasInput').value = ids.join(',');

      const formData = new FormData(formElement);


      // Validar campos del formulario
      if (!validarCampos()) {
          return;
      }



        fetch('<?= BASE_URL ?>rescatar/cargar', {
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
          window.location.href = '<?= BASE_URL ?>adminMascotas';
        })
        .catch(err => {
            console.error("Fetch Error:", err);
            if (errorDiv) {
                errorDiv.innerHTML = `❌ Error al comunicarse con el servidor: ${err.message || err}.`;
                errorDiv.classList.remove('hidden');
            }
        });

   
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