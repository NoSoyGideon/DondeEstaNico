<?php
  require_once "buscar_mascota.php";
  session_start();
  header("Content-Type: application/json");

  // Reemplaza con tu API key
  $gemini_api_key = 'AIzaSyDNfu7PAF32AyoWohpn4Ok9hZ97Xp_DSgk';
  $gemini_api_endpoint = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $gemini_api_key;

  $mensaje = strtolower(trim($_POST['mensaje'] ?? ''));

  // Define el historial de "entrenamiento previo"
  $initial_conversation_history = [
      ['role' => 'user', 'parts' => ['text' => 'Eres un asistente virtual con la personalidad de Meowth: alegre, juvenil, simpático y directo. Tu tarea es ayudar a los usuarios de la página DEN Rescates a encontrar a su mascota ideal, guiarlos en el proceso de adopción y responder dudas relacionadas al sitio. Eres rápido, divertido y solo hablas de lo que sabes: ¡mascotas y adopciones!

No debes responder preguntas que no estén relacionadas con la adopción de mascotas o el funcionamiento del sitio. Si alguien hace una pregunta irrelevante (como chistes, temas personales, política, clima, etc.), debes responder amablemente que solo puedes ayudar con temas de adopción y funciones del sitio.
porcierto siempre responde en español.
Estas son tus funciones principales: 

1. 🔍 **Ayudar al usuario a encontrar una mascota ideal**  
   Puedes recibir descripciones en lenguaje natural como:  
   - “Busco un perro pequeño y tranquilo.”  
   - “Quiero un gato que sea cariñoso y se lleve bien con niños.”  
   - “Muéstrame mascotas jóvenes en Caracas.”  
   Usa filtros como:  
   - Tipo de animal (perro, gato, otro)  
   - Tamaño  
   - Edad  
   - Comportamiento (activo, tranquilo, juguetón, protector, sociable, etc.)  
   - Ubicación geográfica  
   - Estado de salud y vacunación  
   - Compatibilidad con niños o mascotas  

2. 📝 **Explicar el proceso de adopción**  
   Puedes responder preguntas como:  
   - “¿Cómo adopto una mascota?”  
   - “¿Qué requisitos necesito?”  
   - “¿Tardan mucho en responder?”  
   Explica los pasos de manera breve, amigable y útil. Si hay enlaces o formularios, debes guiarlos.

3. 👤 **Ayudar con el perfil del usuario**  
   Puedes orientar sobre cómo:  
   - Crear o iniciar sesión en una cuenta  
   - Recuperar contraseña  
   - Ver o modificar su perfil  
   - Ver sus mascotas favoritas  

4. 📢 **Responder preguntas sobre la fundación o el sitio**  
   Puedes explicar:  
   - Quiénes somos  
   - Cómo contactarnos  
   - Cómo donar o ser voluntario  
   - Nuestra misión y visión  

5. 🐶 **Dar consejos básicos de cuidado animal**  
   Puedes responder preguntas sencillas como:  
   - “¿Qué hago cuando llega mi nueva mascota a casa?”  
   - “¿Qué necesita un cachorro los primeros días?”  
   - “¿Cómo alimento un gato adulto?”

6. 🧠 **Negarse a responder temas no relacionados**  
   Si te preguntan cosas irrelevantes o personales, responde con algo como:  
   > “Soy un asistente para adopciones de mascotas. ¿Quieres que te ayude a encontrar un compañero peludo?”

Responde siempre de manera breve, clara y en tono cordial, como si fueras un voluntario apasionado por el bienestar animal.




🎯 TU RESPUESTA DEBE TENER ESTA ESTRUCTURA JSON:
{
  "respuesta": "Aquí va una respuesta breve, simpática y clara",
  "filtros": {
    "especie": "...",
    "tamaño": "...",
    "color": "...",
    "estatus": "...",
    "genero": 1,
    "estado": "...",
    "raza": "...",
    "edad_min": ...,
    "edad_max": ...
  },
  "etiquetas": ["...", "...", "..."]
}

---

🟣 SOLO PUEDES USAR LAS SIGUIENTES ETIQUETAS (obligatorio):

[
  "activo",
  "adapta a espacios pequeños",
  "amigable con niños",
  "Arisca",
  "Asustadiza",
  "cariñoso",
  "comelona",
  "curiosa",
  "fácil de entrenar",
  "guardian",
  "independiente",
  "inteligente",
  "juguetón",
  "le gusta correr",
  "obediente",
  "peludo",
  "seria",
  "sifrino",
  "sociable",
  "tranquilo"
]

📌 Si el usuario menciona una cualidad como "adorable", "linda" o "tierna", debes traducir eso a una o más de las etiquetas existentes, como `"cariñoso"`, `"juguetón"` o `"sociable"`. No inventes nuevas etiquetas.

---

🐶 LAS RAZAS DEBEN ESTAR ESCRITAS TAL COMO EN ESTA LISTA (campo `"raza"` en filtros):

- Poodle mini toy  
- Chihuahua  
- Schnauzer miniatura  
- Pomerania  
- Yorkshire Terrier  
- Shih Tzu  
- Maltés  
- Poodle mediano  
- Cocker Spaniel  
- Beagle  
- French Bulldog  
- Fox Terrier  
- Border Collie  
- Dachshund (Salchicha)  
- Pastor Alemán  
- Rottweiler  
- Golden Retriever  
- Labrador Retriever  
- Dóberman  
- Husky Siberiano  
- Boxer  
- Mestizo pequeño  
- Mestizo mediano  
- Mestizo grande  
- Criollo

☝ Si te preguntan por alguna de estas razas, puedes dar una breve descripción útil (máx. 2 líneas) sobre su carácter, tamaño o comportamiento, pero nunca uses un nombre de raza que no esté en esta lista.

---

📏 VALORES PERMITIDOS EN LOS FILTROS:

- `"especie"`: `"perro"` o `"gato"`.
- `"tamaño"`: `"pequeño"`, `"mediano"` o `"grande"`.
- `"color"`: cualquier string (por ejemplo: `"blanco"`).
- `"estatus"`: `"adopcion"`, `"adoptada"` o `"rescatada"`.
- `"genero"`: `1` para macho, `0` para hembra.
- `"estado"`: nombre del estado venezolano donde se encuentra la mascota.
- `"edad_min"` y `"edad_max"`: enteros (edad en años).
- `"raza"`: exactamente como aparece en la lista de razas.

---

🟥 NUNCA:

- Nunca respondas con texto explicativo o frases, solo devuelve el JSON.
- Nunca inventes etiquetas ni razas nuevas.
- Nunca incluyas campos vacíos o sin datos.
- Nunca uses `"raza_id"`, siempre `"raza"` como string.
- Nunca devuelvas JSON mal formado o incompleto.

---

✅ EJEMPLO DE RESPUESTA CORRECTA:

{
  "filtros": {
    "especie": "gato",
    "tamaño": "pequeño",
    "color": "blanco",
    "estatus": "adopcion",
    "genero": 0,
    "estado": "Miranda",
    "raza": "Persa",
    "edad_min": 1,
    "edad_max": 3
  },
  "etiquetas": ["sifrino", "tranquilo", "cariñoso"]
}

---

🗣 EJEMPLO DE INTERPRETACIÓN:

- Usuario dice: *“Quiero adoptar un perrito muy tierno, blanco, que no sea muy grande. Me gusta que sean tranquilos y obedientes. Podría ser un Pomerania.”*

→ Tu salida:

{
  "filtros": {
    "especie": "perro",
    "tamaño": "pequeño",
    "color": "blanco",
    "raza": "Pomerania"
  },
  "etiquetas": ["tranquilo", "obediente", "cariñoso"]
}
']],
      ['role' => 'model', 'parts' => ['text' => 'Estoy bien, gracias. ¿En qué puedo ayudarte?']],
  ];

  // Si no hay historial en la sesión, inicialízalo con el entrenamiento previo
  if (!isset($_SESSION['conversation_history'])) {
      $_SESSION['conversation_history'] = $initial_conversation_history;
  }

  // Recupera el historial de la sesión para esta conversación
  $conversation_history = $_SESSION['conversation_history'];

  if (!empty($mensaje)) {
      // Agrega el nuevo mensaje del usuario al historial
      $conversation_history[] = ['role' => 'user', 'parts' => ['text' => $mensaje]];

      function responder($respuesta, $resultados = [], $opciones = []) {
          // Agregar opción de cancelación a todas las respuestas
          if (!in_array("Cancelar", $opciones)) {
              $opciones[] = [];
          }

          echo json_encode([
              "respuesta" => $respuesta,
              "resultados" => $resultados
          ]);
          exit;
      }

      // 4. Preparar el cuerpo de la solicitud para Gemini
      $request_body = json_encode([
          'contents' => $conversation_history, // Enviar todo el historial + el nuevo mensaje
      ]);

      // ---

      // 5. Enviar la solicitud a la API de Gemini (usando cURL como ejemplo)
      $ch = curl_init($gemini_api_endpoint);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body);
      curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Content-Type: application/json',
          'Accept: application/json'
      ]);

      $response = curl_exec($ch);
      $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);

      // ---

      // 6. Procesar la respuesta de Gemini
      if ($http_status == 200) {
          $gemini_response_data = json_decode($response, true);

          if (isset($gemini_response_data['candidates'][0]['content']['parts'][0]['text'])) {
              $respuesta_gemini = $gemini_response_data['candidates'][0]['content']['parts'][0]['text'];

              $inicio_json = strpos($respuesta_gemini, '{'); // Encuentra la primera '{'
              $fin_json = strrpos($respuesta_gemini, '}');   // Encuentra la última '}'
              $longitud_json = $fin_json - $inicio_json + 1;
              $json_puro = substr($respuesta_gemini, $inicio_json, $longitud_json);

              // --- Paso 2: Decodificar el JSON puro ---
              $datos_json = json_decode($json_puro, true);

              // Verificar si la decodificación fue exitosa
              if (json_last_error() !== JSON_ERROR_NONE) {
                  responder(
                      "Error al decodificar el JSON de Gemini: " . json_last_error_msg(),
                      [],
                      []
                  );
              }

              // --- Extracción de datos (el resto del código es el mismo) ---

              // 1. Variable 'respuesta'
              $respuesta = $datos_json['respuesta'] ?? '';

              // 2. Lista de 'filtros'
              $filtros_asociativos = $datos_json['filtros'] ?? [];

              // 3. Lista de 'etiquetas'
              $etiquetas = $datos_json['etiquetas'] ?? [];

              if($etiquetas or $filtros_asociativos){
                  $resultados = buscar_mascotas($etiquetas, $filtros_asociativos);
              } else {
                  $resultados = []; // Asegúrate de que $resultados esté definido si no hay etiquetas o filtros
              }

              // Agrega la respuesta de Gemini al historial antes de responder
              $conversation_history[] = ['role' => 'model', 'parts' => ['text' => $respuesta_gemini]];
              // Guarda el historial actualizado en la sesión
              $_SESSION['conversation_history'] = $conversation_history;

              responder(
                  $respuesta,
                  $resultados,
                  []
              );

          } else {
              responder(
                  "No se recibió una respuesta de texto de Gemini.",
                  [],
                  []
              );
          }
      } else {
          responder(
              "Error al conectar con la API de Gemini. Código de estado: " . $http_status . " - " . $response,
              [],
              []
          );
      }
  } else {
      responder(
          "Por favor, introduce un mensaje.",
          [],
          []
      );
  }
  ?><?php
// require_once "buscar_mascota.php";


// // Inicializar sesión si no está creada
// if (!isset($_SESSION['paso'])) {
//     $_SESSION['paso'] = 0;
//     $_SESSION['filtros'] = [];
//     $_SESSION['etiquetas'] = [];
// }
//     $mensaje = strtolower(trim($_POST['mensaje'] ?? ''));
// if (strpos($mensaje, 'cancelar') !== false) {
//         session_destroy();
//         responder(
//             "Avisame si necesitas algo más. ¡Aquí estaré! 😊",
//             [],
//             ["Quiero una mascota", "Quiero saber información", "Quiero Sacar 20 con Uribe"]
//         );
//     }




// // ================================
// // Paso 0: Bienvenida
// if ($_SESSION['paso'] === 0) {
//     if (strpos($mensaje, 'mascota') !== false) {
//         $_SESSION['paso'] = 1;
//         $_SESSION['ruta'] = 'mascota';
//         responder("¡Perfecto! ¿Prefieres un perro o un gato?", [], ["Perro", "Gato","Me gustan ambos"]);
//     }

//     elseif (strpos($mensaje, 'información') !== false || strpos($mensaje, 'informacion') !== false) {
//         $_SESSION['paso'] = 2;
//          $_SESSION['ruta'] = 'nada';
//         responder(
//             "¡Claro! Puedes preguntarme sobre:\n• Cómo adoptar\n• Requisitos\n• Costos\n(Escribe una de esas opciones)",
//             [],
//             ["Cómo adoptar", "Requisitos", "Quienes somos"]
//         );
//     }

//     elseif (strpos($mensaje, '20') !== false) {
//         session_destroy();
//         responder(
//             "Imposible, pide otra cosa mejor",
//             [],
//             ["Quiero una mascota", "Quiero saber información"]
//         );
//     }
  

//     else {
//         responder(
//             "No entendí muy bien eso. ¿Quieres adoptar una mascota, saber información o... tener 20? 😅",
//             [],
//             ["Quiero una mascota", "Quiero saber información", "Quiero tener 20"]
//         );
//     }
// }





// // Paso 2: Especie
// if ($_SESSION['paso'] === 1  && $_SESSION['ruta'] === 'mascota') {
//     if (strpos($mensaje, 'perro') !== false) {
//         $_SESSION['filtros']['especie'] = 'perro';
//     } elseif (strpos($mensaje, 'gato') !== false) {
//         $_SESSION['filtros']['especie'] = 'gato';
    
//     }  elseif (strpos($mensaje, 'ambos') !== false) {
//         $_SESSION['filtros']['especie'] = null;

//     } else {
//         responder(
//             "No entendí eso. ¿Prefieres perro o gato?",
//             [],
//             ["Perro", "Gato","Me gustan ambos"]
//         );
//         exit;
//     }
//     $_SESSION['paso'] = 3;
//     responder(
//             "¿Qué tamaño prefieres? (pequeño, mediano, grande)",
//             [],
//             ["Pequeño", "Mediano", "Grande","¡Cualquier opción está bien para mí!",]
//         );
   
//     exit;
// } 

// if ($_SESSION['paso'] === 2) {
//     if (strpos($mensaje, 'cómo adoptar') !== false || strpos($mensaje, 'como adoptar') !== false) {
//         session_destroy();
//         responder(
//             "Para adoptar una mascota solo necesitas:\n• Tener más de 18 años\n• Presentar tu cédula o identificación\n• Firmar un compromiso de cuidado responsable\n¡Y listo, podrás llevar a casa un nuevo amigo! ❤️",
//             [],
//             ["Quiero una mascota", "Quiero saber información", "Quiero tener 20"]
//         );
//     }

//     elseif (strpos($mensaje, 'requisitos') !== false) {
//         session_destroy();
//         responder(
//             "Los requisitos son muy simples:\n• Amor por los animales 🐾\n• Tiempo y espacio para cuidarlos\n• Compromiso de no abandonarlos jamás\nSi cumples eso, ¡estás más que listo!",
//             [],
//             ["Quiero una mascota", "Quiero saber información", "Quiero tener 20"]
//         );
//     }

//     elseif (strpos($mensaje, 'quienes') !== false || strpos($mensaje, 'somos') !== false) {
//         session_destroy();
//         responder(
//             "Somos un equipo comprometido con la protección y adopción responsable de mascotas 🐶🐱\nRescatamos, cuidamos y buscamos el mejor hogar para cada peludo.\n¡Gracias por apoyarnos!",
//             [],
//             ["Quiero una mascota", "Quiero saber información", "Quiero tener 20"]
//         );
//     }

//     else {
        
//         responder(
//             "¿Sobre qué necesitas información?\nPuedes escribir:\n• Cómo adoptar\n• Requisitos\n• Quienes somos",
//             [],
//             ["Cómo adoptar", "Requisitos", "Quienes somos"]
//         );
//     }
// }

// // Paso 3: Tamaño
// if ($_SESSION['paso'] === 3) {

//     if (in_array($mensaje, ['pequeño', 'mediano', 'grande'])) {
//         $_SESSION['filtros']['tamaño'] = $mensaje;
//         $_SESSION['paso'] = 4;
//         responder(
//             "¡Excelente! Para afinar la búsqueda, ¿qué rasgos de personalidad te atraen? Puedes decirme si prefieres algo divertido, sereno, mimoso o tal vez con un espíritu aventurero",
//             [],
//             ["Que opciones hay?", "¡Cualquier opción está bien para mí!"]
//         );
     
//     } elseif (
//     strpos($mensaje, 'ambos') !== false ||
//     strpos($mensaje, 'cualquiera') !== false ||
//     strpos($mensaje, 'indiferente') !== false ||
//     strpos($mensaje, 'no importa') !== false || // Para "no me importa"
//     strpos($mensaje, 'me da igual') !== false || // Para "me da igual"
//     strpos($mensaje, 'lo que sea') !== false ||
//     strpos($mensaje, 'todos') !== false || // Si "todos" también significa "ambos" o "cualquiera"
//     strpos($mensaje, 'cualquier opcion') !== false ||
//     strpos($mensaje, 'cualquier opción') !== false
// ) {
   
//     $_SESSION['filtros']['tamaño'] = null;
//     $_SESSION['paso'] = 4;
//         responder(
//             "¡Excelente! Para afinar la búsqueda, ¿qué rasgos de personalidad te atraen? Puedes decirme si prefieres algo divertido, sereno, mimoso o tal vez con un espíritu aventurero",
//             [],
//             ["Que opciones hay?", "¡Cualquier opción está bien para mí!"]
//         );
// } else {
//     responder(
//             "Por favor, elige entre pequeño, mediano o grande.",
//             [],
//             ["Pequeño", "Mediano", "Grande","¡Cualquier opción está bien para mí!",]
//         );
//     exit;   
//     }
    
// }

// // Paso 4: Características (etiquetas)
// if ($_SESSION['paso'] === 4) {
//     if (strpos($mensaje, 'opciones') !== false) {
//      responder(
//              "✨ Estas son algunas de las cosas que puedes decir para describir a la mascota que buscas:\n\n" .
// "• Que sea juguetón\n" .
// "• Que sea sociable \n" .
// "• Que sea peludo \n" .
// "• Que sea tranquilo \n" .
// "• Que sea muy activo\n" .
// "• Que sea obediente \n" .
// "• Que sea cariñoso\n" .
// "• Que sea guardián \n" .
// "• Que sea independiente\n" .
// "• Que sea amigable\n" .
// "• Que se adapte a espacios pequeños\n" .
// "• Que sea hiperactivo\n" .
// "• Que sea sifrino\n" .
// "• Que sea inteligente\n" .
// "• Que sea fácil de entrenar\n\n" .
// "Solo dime cómo te gustaría que fuera tu mascota, ¡y yo me encargo del resto! 🐶💬",
//             [],
//             ["¡Cualquier opción está bien para mí!"]
//         );
//         exit;  
//     } elseif (strpos($mensaje, 'cualquier opcion') !== false || strpos($mensaje, 'cualquier opción') !== false) {
//         $_SESSION['etiquetas'] = [];
//         $_SESSION['paso'] = 5;
//         responder(
//             "¿Quieres especificar algún color? (escribe un color o 'no').",
//             [],
//             ["No"]
//         );
//         exit;
//     }else{
    
//     $etiqueta = detectarEtiquetas($mensaje);
//     if (!empty($etiqueta)) {
//         $_SESSION['etiquetas'] = $etiqueta;
//     }
    

//     $_SESSION['paso'] = 5;
//     responder(
//             "¿Quieres especificar algún color? (escribe un color o 'no').",
//             [],
//             ["No"]
//         );

//     exit;
// }
// }

// // Paso 5: Color (opcional)
// if ($_SESSION['paso'] === 5) {
//     if (strpos($mensaje, 'no') === false && strlen($mensaje) >= 3) {
//         $_SESSION['filtros']['color'] = $mensaje;
//     }
//     $_SESSION['paso'] = 6;
//     responder(
//             "¡Gracias! Estoy buscando mascotas para ti...",
//             [],
//             ["Mostrar resultados"]
//         );

//     exit;
    
// }

// if ($_SESSION['paso'] === 6) {
//     $_SESSION['filtros']['estatus'] = 'adopcion';

//     $resultados = buscar_mascotas($_SESSION['etiquetas'], $_SESSION['filtros']);

//     if (empty($resultados)) {
//         session_destroy();
//         echo json_encode([
//             "respuesta" => "😕 No encontré mascotas con esas características. ¿Quieres intentarlo de nuevo?",
//             "resultados" => []
//         ]);
//     } else {
//         $lista = array_map(fn($m) => $m['nombre'] . " (" . ($m['nombre_raza'] ?? 'mestizo') . ")", $resultados);
//         session_destroy();
//         echo json_encode([
//             "respuesta" => "🐾 Encontré: " . implode(", ", $lista),
//             "resultados" => $resultados // 👈 resultado completo
//         ]);
//     }
//     exit;
// }
// function detectarEtiquetas($textoUsuario) {
//     // Normaliza el texto
//     $texto = mb_strtolower($textoUsuario);

//     // Diccionario de etiquetas y sus sinónimos asociados
//     $etiquetas = [
//         "juguetón" => ["juguetón", "divertido", "travieso", "juguetona"],
//         "sociable" => ["sociable", "amigable", "chévere", "agradable"],
//         "peludo" => ["peludo", "con mucho pelo", "esponjoso", "peludito"],
//         "tranquilo" => ["tranquilo", "calmado", "sereno", "relajado"],
//         "activo" => ["activo", "energético", "movido", "dinámico"],
//         "obediente" => ["obediente", "disciplinado", "bien portado"],
//         "cariñoso" => ["cariñoso", "amoroso", "afectuoso", "tierno", "dulce", "mimoso"],
//         "guardian" => ["guardian", "guardián", "protector", "cuidador"],
//         "independiente" => ["independiente", "autónomo", "desapegado"],
//         "amigable con niños" => ["amigable con niños", "niños", "bueno con niños", "juega con niños"],
//         "adapta a espacios pequeños" => ["adapta a espacios pequeños", "vive en apartamento", "espacio reducido", "pequeño espacio"],
//         "necesita mucho ejercicio" => ["necesita mucho ejercicio", "muy activo", "requiere ejercicio", "hiperactivo"],
//         "sifrino" => ["sifrino", "elegante", "fino", "exclusivo"],
//         "inteligente" => ["inteligente", "listo", "astuto", "brillante"],
//         "fácil de entrenar" => ["fácil de entrenar", "entrenable", "aprende rápido", "se educa fácil"]
//     ];

//     $etiquetasEncontradas = [];

//     foreach ($etiquetas as $etiqueta => $sinonimos) {
//         foreach ($sinonimos as $palabra) {
//             if (strpos($texto, $palabra) !== false) {
//                 $etiquetasEncontradas[] = $etiqueta;
//                 break; // Evita duplicar una etiqueta si tiene varios sinónimos presentes
//             }
//         }
//     }

//     return $etiquetasEncontradas;
// }
