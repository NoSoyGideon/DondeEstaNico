<?php
session_start();
header("Content-Type: application/json");

require_once "buscar_mascota.php";
function responder($respuesta, $resultados = [], $opciones = []) {
    // Agregar opción de cancelación a todas las respuestas
    if (!in_array("Cancelar", $opciones)) {
        $opciones[] = "Cancelar";
    }

    echo json_encode([
        "respuesta" => $respuesta,
        "resultados" => $resultados,
        "opciones" => $opciones
    ]);
    exit;
}

// Inicializar sesión si no está creada
if (!isset($_SESSION['paso'])) {
    $_SESSION['paso'] = 0;
    $_SESSION['filtros'] = [];
    $_SESSION['etiquetas'] = [];
}
$mensaje = strtolower(trim($_POST['mensaje'] ?? ''));
if (strpos($mensaje, 'cancelar') !== false) {
        session_destroy();
        responder(
            "Avisame si necesitas algo más. ¡Aquí estaré! 😊",
            [],
            ["Quiero una mascota", "Quiero saber información", "Quiero Sacar 20 con Uribe"]
        );
    }




// ================================
// Paso 0: Bienvenida
if ($_SESSION['paso'] === 0) {
    if (strpos($mensaje, 'mascota') !== false) {
        $_SESSION['paso'] = 1;
        $_SESSION['ruta'] = 'mascota';
        responder("¡Perfecto! ¿Prefieres un perro o un gato?", [], ["Perro", "Gato","Me gustan ambos"]);
    }

    elseif (strpos($mensaje, 'información') !== false || strpos($mensaje, 'informacion') !== false) {
        $_SESSION['paso'] = 2;
         $_SESSION['ruta'] = 'nada';
        responder(
            "¡Claro! Puedes preguntarme sobre:\n• Cómo adoptar\n• Requisitos\n• Costos\n(Escribe una de esas opciones)",
            [],
            ["Cómo adoptar", "Requisitos", "Quienes somos"]
        );
    }

    elseif (strpos($mensaje, '20') !== false) {
        session_destroy();
        responder(
            "Imposible, pide otra cosa mejor",
            [],
            ["Quiero una mascota", "Quiero saber información"]
        );
    }
  

    else {
        responder(
            "No entendí muy bien eso. ¿Quieres adoptar una mascota, saber información o... tener 20? 😅",
            [],
            ["Quiero una mascota", "Quiero saber información", "Quiero tener 20"]
        );
    }
}





// Paso 2: Especie
if ($_SESSION['paso'] === 1  && $_SESSION['ruta'] === 'mascota') {
    if (strpos($mensaje, 'perro') !== false) {
        $_SESSION['filtros']['especie'] = 'perro';
    } elseif (strpos($mensaje, 'gato') !== false) {
        $_SESSION['filtros']['especie'] = 'gato';
    
    }  elseif (strpos($mensaje, 'ambos') !== false) {
        $_SESSION['filtros']['especie'] = null;

    } else {
        responder(
            "No entendí eso. ¿Prefieres perro o gato?",
            [],
            ["Perro", "Gato","Me gustan ambos"]
        );
        exit;
    }
    $_SESSION['paso'] = 3;
    responder(
            "¿Qué tamaño prefieres? (pequeño, mediano, grande)",
            [],
            ["Pequeño", "Mediano", "Grande","¡Cualquier opción está bien para mí!",]
        );
   
    exit;
} 

if ($_SESSION['paso'] === 2) {
    if (strpos($mensaje, 'cómo adoptar') !== false || strpos($mensaje, 'como adoptar') !== false) {
        session_destroy();
        responder(
            "Para adoptar una mascota solo necesitas:\n• Tener más de 18 años\n• Presentar tu cédula o identificación\n• Firmar un compromiso de cuidado responsable\n¡Y listo, podrás llevar a casa un nuevo amigo! ❤️",
            [],
            ["Quiero una mascota", "Quiero saber información", "Quiero tener 20"]
        );
    }

    elseif (strpos($mensaje, 'requisitos') !== false) {
        session_destroy();
        responder(
            "Los requisitos son muy simples:\n• Amor por los animales 🐾\n• Tiempo y espacio para cuidarlos\n• Compromiso de no abandonarlos jamás\nSi cumples eso, ¡estás más que listo!",
            [],
            ["Quiero una mascota", "Quiero saber información", "Quiero tener 20"]
        );
    }

    elseif (strpos($mensaje, 'quienes') !== false || strpos($mensaje, 'somos') !== false) {
        session_destroy();
        responder(
            "Somos un equipo comprometido con la protección y adopción responsable de mascotas 🐶🐱\nRescatamos, cuidamos y buscamos el mejor hogar para cada peludo.\n¡Gracias por apoyarnos!",
            [],
            ["Quiero una mascota", "Quiero saber información", "Quiero tener 20"]
        );
    }

    else {
        
        responder(
            "¿Sobre qué necesitas información?\nPuedes escribir:\n• Cómo adoptar\n• Requisitos\n• Quienes somos",
            [],
            ["Cómo adoptar", "Requisitos", "Quienes somos"]
        );
    }
}

// Paso 3: Tamaño
if ($_SESSION['paso'] === 3) {

    if (in_array($mensaje, ['pequeño', 'mediano', 'grande'])) {
        $_SESSION['filtros']['tamaño'] = $mensaje;
        $_SESSION['paso'] = 4;
        responder(
            "¡Excelente! Para afinar la búsqueda, ¿qué rasgos de personalidad te atraen? Puedes decirme si prefieres algo divertido, sereno, mimoso o tal vez con un espíritu aventurero",
            [],
            ["Que opciones hay?", "¡Cualquier opción está bien para mí!"]
        );
     
    } elseif (
    strpos($mensaje, 'ambos') !== false ||
    strpos($mensaje, 'cualquiera') !== false ||
    strpos($mensaje, 'indiferente') !== false ||
    strpos($mensaje, 'no importa') !== false || // Para "no me importa"
    strpos($mensaje, 'me da igual') !== false || // Para "me da igual"
    strpos($mensaje, 'lo que sea') !== false ||
    strpos($mensaje, 'todos') !== false || // Si "todos" también significa "ambos" o "cualquiera"
    strpos($mensaje, 'cualquier opcion') !== false ||
    strpos($mensaje, 'cualquier opción') !== false
) {
   
    $_SESSION['filtros']['tamaño'] = null;
    $_SESSION['paso'] = 4;
        responder(
            "¡Excelente! Para afinar la búsqueda, ¿qué rasgos de personalidad te atraen? Puedes decirme si prefieres algo divertido, sereno, mimoso o tal vez con un espíritu aventurero",
            [],
            ["Que opciones hay?", "¡Cualquier opción está bien para mí!"]
        );
} else {
    responder(
            "Por favor, elige entre pequeño, mediano o grande.",
            [],
            ["Pequeño", "Mediano", "Grande","¡Cualquier opción está bien para mí!",]
        );
    exit;   
    }
    
}

// Paso 4: Características (etiquetas)
if ($_SESSION['paso'] === 4) {
    if (strpos($mensaje, 'opciones') !== false) {
     responder(
             "✨ Estas son algunas de las cosas que puedes decir para describir a la mascota que buscas:\n\n" .
"• Que sea juguetón\n" .
"• Que sea sociable \n" .
"• Que sea peludo \n" .
"• Que sea tranquilo \n" .
"• Que sea muy activo\n" .
"• Que sea obediente \n" .
"• Que sea cariñoso\n" .
"• Que sea guardián \n" .
"• Que sea independiente\n" .
"• Que sea amigable\n" .
"• Que se adapte a espacios pequeños\n" .
"• Que sea hiperactivo\n" .
"• Que sea sifrino\n" .
"• Que sea inteligente\n" .
"• Que sea fácil de entrenar\n\n" .
"Solo dime cómo te gustaría que fuera tu mascota, ¡y yo me encargo del resto! 🐶💬",
            [],
            ["¡Cualquier opción está bien para mí!"]
        );
        exit;  
    } elseif (strpos($mensaje, 'cualquier opcion') !== false || strpos($mensaje, 'cualquier opción') !== false) {
        $_SESSION['etiquetas'] = [];
        $_SESSION['paso'] = 5;
        responder(
            "¿Quieres especificar algún color? (escribe un color o 'no').",
            [],
            ["No"]
        );
        exit;
    }else{
    
    $etiqueta = detectarEtiquetas($mensaje);
    if (!empty($etiqueta)) {
        $_SESSION['etiquetas'] = $etiqueta;
    }
    

    $_SESSION['paso'] = 5;
    responder(
            "¿Quieres especificar algún color? (escribe un color o 'no').",
            [],
            ["No"]
        );

    exit;
}
}

// Paso 5: Color (opcional)
if ($_SESSION['paso'] === 5) {
    if (strpos($mensaje, 'no') === false && strlen($mensaje) >= 3) {
        $_SESSION['filtros']['color'] = $mensaje;
    }
    $_SESSION['paso'] = 6;
    responder(
            "¡Gracias! Estoy buscando mascotas para ti...",
            [],
            ["Mostrar resultados"]
        );

    exit;
    
}

if ($_SESSION['paso'] === 6) {
    $_SESSION['filtros']['estatus'] = 'adopcion';

    $resultados = buscar_mascotas($_SESSION['etiquetas'], $_SESSION['filtros']);

    if (empty($resultados)) {
        session_destroy();
        echo json_encode([
            "respuesta" => "😕 No encontré mascotas con esas características. ¿Quieres intentarlo de nuevo?",
            "resultados" => []
        ]);
    } else {
        $lista = array_map(fn($m) => $m['nombre'] . " (" . ($m['nombre_raza'] ?? 'mestizo') . ")", $resultados);
        session_destroy();
        echo json_encode([
            "respuesta" => "🐾 Encontré: " . implode(", ", $lista),
            "resultados" => $resultados // 👈 resultado completo
        ]);
    }
    exit;
}
function detectarEtiquetas($textoUsuario) {
    // Normaliza el texto
    $texto = mb_strtolower($textoUsuario);

    // Diccionario de etiquetas y sus sinónimos asociados
    $etiquetas = [
        "juguetón" => ["juguetón", "divertido", "travieso", "juguetona"],
        "sociable" => ["sociable", "amigable", "chévere", "agradable"],
        "peludo" => ["peludo", "con mucho pelo", "esponjoso", "peludito"],
        "tranquilo" => ["tranquilo", "calmado", "sereno", "relajado"],
        "activo" => ["activo", "energético", "movido", "dinámico"],
        "obediente" => ["obediente", "disciplinado", "bien portado"],
        "cariñoso" => ["cariñoso", "amoroso", "afectuoso", "tierno", "dulce", "mimoso"],
        "guardian" => ["guardian", "guardián", "protector", "cuidador"],
        "independiente" => ["independiente", "autónomo", "desapegado"],
        "amigable con niños" => ["amigable con niños", "niños", "bueno con niños", "juega con niños"],
        "adapta a espacios pequeños" => ["adapta a espacios pequeños", "vive en apartamento", "espacio reducido", "pequeño espacio"],
        "necesita mucho ejercicio" => ["necesita mucho ejercicio", "muy activo", "requiere ejercicio", "hiperactivo"],
        "sifrino" => ["sifrino", "elegante", "fino", "exclusivo"],
        "inteligente" => ["inteligente", "listo", "astuto", "brillante"],
        "fácil de entrenar" => ["fácil de entrenar", "entrenable", "aprende rápido", "se educa fácil"]
    ];

    $etiquetasEncontradas = [];

    foreach ($etiquetas as $etiqueta => $sinonimos) {
        foreach ($sinonimos as $palabra) {
            if (strpos($texto, $palabra) !== false) {
                $etiquetasEncontradas[] = $etiqueta;
                break; // Evita duplicar una etiqueta si tiene varios sinónimos presentes
            }
        }
    }

    return $etiquetasEncontradas;
}
