
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/adopcion.css">
    <script defer src="<?php echo BASE_URL; ?>Assets/js/adopcion.js"></script>

</head>
<body>



<?php include_once(__DIR__ . '/../Templates/header.php'); ?>

<main >
  <section class="hero">
    <div class="hero-texto">
      <h1>Encuentra a tu nuevo mejor amigo 🐾</h1>
      <p>Miles de mascotas esperan por ti. Filtra por tamaño, edad o ubicación para encontrar a la ideal.</p>
   
    </div>
    <div class="hero-img">
      <img src="<?php echo BASE_URL; ?>Assets/images/adoptar/uwu.png" alt="Perro adorable en adopción" />
    </div>
  </section>






 
  <section class="seccion-chat">
 <div class="chat-info">
  <img src="<?php echo BASE_URL; ?>Assets/images/adoptar/meowth.png" alt="Mascota chat">
  <h2>¿Qué mascota estás buscando?</h2>
  <button onclick="mostrarChat()">Hablar con el asistente</button>

  <div id="chat-container" class="hidden">
    <button id="cerrar-chat" onclick="cerrarChat()" style="align-self: flex-end; margin-bottom: 0.5rem;">Cerrar ✖️</button>
    <div id="chat" class="chat-box"></div>
    <div style="display: flex; align-items: center;">
      <input type="text" id="entrada" placeholder="Escribe tu mensaje..." />
      <button id="enviar" onclick="enviarMensaje()">Enviar</button>
    </div>
  </div>
</div>

  </section>


<section class="max-w-7xl mx-auto mt-20 px-4">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 " id="lista-mascotas">
         <?php 
       foreach ($data['mascotas'] as $m): 

      

    
      ?>

 
<!-- CARD MASCOTA -->
   <div class="p-4">

<script defer src="<?php echo BASE_URL; ?>Assets/js/cardMascota.js"></script>
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="relative">
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
            <img class="w-full h-full object-cover" src="<?php echo BASE_URL; ?><?php echo $m['url_foto']; ?>" alt="Shiba Inu">
        </div>


<!-- Corazón FAVORITO -->
<div
  id="favBtn"
       <?php if (isset($_SESSION['nombre'])): ?>
  
  data-id="<?php echo $m['id']; ?>"
  data-fav="<?php echo $m['es_favorita']; ?>"
  onclick="toggleFavorite(this)"
    <?php else: ?>
        <?php endif; ?>
  style="
    position: absolute; top: 12px; left: 12px; padding: 4px; 
    border-radius: 6px; cursor: pointer; 
    background-color: white; /* fondo inicial */
    display: inline-flex; align-items: center; justify-content: center;
    width: 32px; height: 32px;
    transition: background-color 0.3s ease;
  "
>
  <svg
    id="favIcon"
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 20 20"
    fill="currentColor"
    style="width: 20px; height: 20px; color: #675BC8; transition: color 0.3s ease;"
  >
    <path d="M3.172 5.172a4.5 4.5 0 016.364 0l.464.464.464-.464a4.5 4.5 0 116.364 6.364L10 18.243l-6.828-6.707a4.5 4.5 0 010-6.364z" />
  </svg>
</div>






    </div>
    <div class="p-4">

    
               <?php
        $especie = strtolower(trim($m['especie']));
        if ($especie === 'perro') {
            // Icono de perro
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dog-icon lucide-dog"><path d="M11.25 16.25h1.5L12 17z"/><path d="M16 14v.5"/><path d="M4.42 11.247A13.152 13.152 0 0 0 4 14.556C4 18.728 7.582 21 12 21s8-2.272 8-6.444a11.702 11.702 0 0 0-.493-3.309"/><path d="M8 14v.5"/><path d="M8.5 8.5c-.384 1.05-1.083 2.028-2.344 2.5-1.931.722-3.576-.297-3.656-1-.113-.994 1.177-6.53 4-7 1.923-.321 3.651.845 3.651 2.235A7.497 7.497 0 0 1 14 5.277c0-1.39 1.844-2.598 3.767-2.277 2.823.47 4.113 6.006 4 7-.08.703-1.725 1.722-3.656 1-1.261-.472-1.855-1.45-2.239-2.5"/></svg>';
        } elseif ($especie === 'gato') {
            // Icono de gato
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cat-icon lucide-cat"><path d="M12 5c.67 0 1.35.09 2 .26 1.78-2 5.03-2.84 6.42-2.26 1.4.58-.42 7-.42 7 .57 1.07 1 2.24 1 3.44C21 17.9 16.97 21 12 21s-9-3-9-7.56c0-1.25.5-2.4 1-3.44 0 0-1.89-6.42-.5-7 1.39-.58 4.72.23 6.5 2.23A9.04 9.04 0 0 1 12 5Z"/><path d="M8 14v.5"/><path d="M16 14v.5"/><path d="M11.25 16.25h1.5L12 17l-.75-.75Z"/></svg>';
        } else {
            // Default o desconocido
            echo '<svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4" />
            </svg>';
        }
        ?>
     <h3 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($m['nombre']) ?></h3>
        
     
     
     <div class="flex items-center text-sm text-gray-600 mb-3">
           <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
            </svg>
            <?= htmlspecialchars($m['estado']) ?>   , <?= htmlspecialchars(strlen($m['direccion']) > 25 ? substr($m['direccion'], 0, 25) . '...' : $m['direccion']) ?>  <!--  Aquí va el estado y direccion de la mascota -->
        </div>

        <div class="space-y-2 mb-4">
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Gender:</span>
                <span class="text-sm <?= getColorClass('gender', $m['genero']) ?> px-2 py-1 rounded"><?= ($m['genero'] == 1) ? 'Male' : 'Female'; ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Breed:</span>
                <span class="text-sm <?= buscarColorPorRaza($data['razasConColor'], $m['nombre_raza']) ?> px-2 py-1 rounded"><?= $m['nombre_raza'] ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Age:</span>
                <span class="text-sm bg-purple-light text-purple-dark px-2 py-1 rounded"><?= procesarFechaYValores($m['fecha_nacimiento'], $m['edad_minima'], $m['edad_maxima']) ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Size:</span>
                <span class="text-sm <?= getColorClass('size', $m['altura']) ?> px-2 py-1 rounded"><?= $m['altura'] ?> cm</span>
            </div>
        </div>

        <p class="text-sm text-gray-600 mb-4">
            <?= htmlspecialchars(strlen($m['descripcion']) > 74 ? substr($m['descripcion'], 0, 74) . '...' : $m['descripcion']) ?>
        </p>


        <a href="<?php echo BASE_URL; ?>desc_mascota?id=<?php echo $m['id']; ?>" class=" items-center w-full bg-white border border-purple-main text-purple-main py-2 px-6 rounded hover:bg-purple-light transition-colors">
            Más información
        </a>
        <p class="text-sm text-gray-600 mb-4">
               
        </p>
    </div>




</div>


</div>

          
      <?php endforeach; ?>
</section>

</main>

<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>



<script>
function renderizarMascotas(lista) {
  const contenedor = document.getElementById("lista-mascotas");
  contenedor.innerHTML = ""; // limpiar

  lista.forEach(m => {
    const div = document.createElement("div");
    div.className = "bg-white rounded-lg shadow-md overflow-hidden";
    div.innerHTML = `
      <div class="relative">
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
          <img class="w-full h-full object-cover" src="${m.url_foto || 'assets/images/default.jpg'}" alt="${m.nombre}">
        </div>
      </div>
      <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-900">${m.nombre}</h3>
        <div class="flex items-center text-sm text-gray-600 mb-3">
          <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
          </svg>
          ${m.estado ?? ''}, ${m.direccion ? (m.direccion.length > 25 ? m.direccion.slice(0, 25) + '...' : m.direccion) : ''}
        </div>
        <p class="text-sm text-gray-600 mb-4">${m.descripcion?.slice(0, 74) || ''}...</p>
        <a href="desc_mascota?id=${m.id}" class="items-center w-full bg-white border border-purple-main text-purple-main py-2 px-6 rounded hover:bg-purple-light transition-colors">
          Más información
        </a>
      </div>
    `;
    contenedor.appendChild(div);
  });
}


function cerrarChat() {
  document.getElementById('chat-container').style.display = 'none';
}


function agregarMensaje(texto, clase) {
  const div = document.createElement("div");
  div.className = "msg " + clase;
  div.textContent = texto;
  document.getElementById("chat").appendChild(div);

  
}

async function enviarMensaje() {
  const input = document.getElementById("entrada");
  const texto = input.value.trim();
  if (!texto) return;

  agregarMensaje(texto, "user");
  input.value = "";

  const res = await fetch("<?php echo BASE_URL; ?>Views/adoptar/chat.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: new URLSearchParams({ mensaje: texto }) // 👈 cambio aquí
  });

  const data = await res.json();
  agregarMensaje(data.respuesta, "bot");

  if (data.resultados && data.resultados.length > 0) {
    renderizarMascotas(data.resultados);
}
if (data.opciones && data.opciones.length > 0) {
  const contenedor = document.createElement("div");
  contenedor.className = "msg bot";

  data.opciones.forEach(opcion => {
    const btn = document.createElement("button");
    btn.textContent = opcion;
    btn.className = "m-1 px-3 py-1 border border-[#0A453A] text-[#0A453A] rounded hover:bg-[#0A453A]/10 text-sm transition";

    btn.addEventListener("click", () => {
      document.getElementById("entrada").value = opcion;
      enviarMensaje(); // como si escribiera el usuario
    });
    contenedor.appendChild(btn);
  });

  document.getElementById("chat").appendChild(contenedor);
}
}


    function mostrarChat() {

      
      document.getElementById('chat-container').style.display = 'flex';

      
  // Solo mostrar bienvenida si es la primera vez
  if (!document.querySelector("#chat .msg")) {
    agregarMensaje("¡Hola! 👋 Soy tu asistente virtual. ¿Con qué te puedo ayudar hoy?", "bot");

    const opciones = [
      "Quiero una mascota",
      "Quiero saber información",
      "Quiero Sacar 20 con Uribe"
    ];

    const contenedorBotones = document.createElement("div");
    contenedorBotones.className = "msg bot opciones flex flex-wrap gap-2 mt-2";

    opciones.forEach(opcion => {
      const btn = document.createElement("button");
      btn.textContent = opcion;
      btn.className = "m-1 px-3 py-1 border border-[#0A453A] text-[#0A453A] rounded hover:bg-[#0A453A]/10 text-sm transition";
      btn.addEventListener("click", () => {
        document.getElementById("entrada").value = opcion;
        enviarMensaje();
      });
      contenedorBotones.appendChild(btn);
    });

    document.getElementById("chat").appendChild(contenedorBotones);
  }
    }



 function toggleFavorite(el) {
    // Leer el estado actual (0 o 1)
    const current = el.getAttribute('data-fav');
    const newState = current === '1' ? '0' : '1';
    el.setAttribute('data-fav', newState);

    // Cambiar colores según estado
    if (newState === '1') {
      el.style.backgroundColor = '#675BC8'; // morado fondo
      el.querySelector('svg').style.color = 'white'; // svg blanco
    } else {
      el.style.backgroundColor = 'white'; // fondo blanco
      el.querySelector('svg').style.color = '#675BC8'; // svg morado
    }

    // Aquí puedes usar el ID y el nuevo estado para guardar en BD o localStorage
    const id = el.getAttribute('data-id');
    console.log('ID:', id, 'Nuevo estado:', newState);

    fetch('<?= BASE_URL ?>adoptar/favoritos', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: `id=${encodeURIComponent(id)}&fav=${encodeURIComponent(newState)}`
    })
    .then(response => response.text())
    .then(data => {
      console.log('Respuesta del servidor:', data);
      // Aquí puedes agregar feedback visual o manejar errores
    })
    .catch(error => {
      console.error('Error en la petición:', error);
      // Opcional: revertir el estado si hubo error
    });
  }


  
  // Opcional: al cargar, aplicar colores según estado inicial
  window.onload = () => {
    const el = document.getElementById('favBtn');
    const fav = el.getAttribute('data-fav');
    if (fav === '1') {
      el.style.backgroundColor = '#675BC8';
      el.querySelector('svg').style.color = 'white';
    }
  };


    // function enviarMensaje() {
    //   const entrada = document.getElementById('entrada');
    //   const chat = document.getElementById('chat');
    //   const mensaje = entrada.value.trim();
    //   if (mensaje) {
    //     const userMsg = document.createElement('div');
    //     userMsg.className = 'msg user';
    //     userMsg.textContent = mensaje;
    //     chat.appendChild(userMsg);

    //     setTimeout(() => {
    //       const botMsg = document.createElement('div');
    //       botMsg.className = 'msg bot';
    //       botMsg.textContent = 'Estoy aquí para ayudarte a encontrar tu mascota ideal 🐶';
    //       chat.appendChild(botMsg);
    //       chat.scrollTop = chat.scrollHeight;
    //     }, 600);

    //     entrada.value = '';
    //     chat.scrollTop = chat.scrollHeight;
    //   }
    // }

</script>


</body>
</html>