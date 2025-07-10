<?php
function iniciarSesion(array $usuario) {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    foreach ($usuario as $clave => $valor) {
        $_SESSION[$clave] = $valor;
    }

    // Alias adicional si querés usarlo para validación
    $_SESSION['id_usuario']     = $usuario['id'];
    $_SESSION['nombre']         = $usuario['nombre'];
    $_SESSION['telefono']       = $usuario['telefono'] ?? null;
    $_SESSION['correo']         = $usuario['correo'];
   // $_SESSION['clave']          = $usuario['clave']; // ⚠️ solo si necesitás, idealmente no guardar
    $_SESSION['admin']          = $usuario['admin'];
    $_SESSION['redes']          = $usuario['redes'] ?? null;
    $_SESSION['fecha_registro'] = $usuario['fecha_registro'];
    $_SESSION['estado']         = $usuario['estado'] ?? null;
    $_SESSION['descripcion']    = $usuario['descripcion'] ?? null;
    $_SESSION['direccion']      = $usuario['direccion'] ?? null;
}

function cerrarSesion() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    session_unset();
    session_destroy();
}




/**
 * Procesa una fecha y dos valores numéricos para determinar una salida.
 *
 * @param string|null $mysqlDate La fecha obtenida de MySQL (formato 'YYYY-MM-DD HH:MM:SS') o null.
 * @param int $valor1 Un número entero.
 * @param int $valor2 Otro número entero.
 * @return string La cadena de texto resultante.
 */
function procesarFechaYValores(?string $mysqlDate, ?int $valor1, ?int $valor2): string {
    // Si la fecha de MySQL es null, retornamos el string "valor 1 - valor 2 años"
    if ($mysqlDate === null) {
        return "{$valor1} - {$valor2} años";
    }

    // Convertimos la fecha de MySQL a un objeto DateTime para facilitar los cálculos
    try {
        $fechaPasada = new DateTime($mysqlDate);
    } catch (Exception $e) {
        // Manejo de error si la fecha no es válida, podríamos retornar un mensaje de error o el default
        return "Fecha inválida: " . $e->getMessage();
    }

    $fechaActual = new DateTime(); // La fecha y hora actual

    // Calculamos la diferencia entre las dos fechas
    $intervalo = $fechaActual->diff($fechaPasada);

    // Si tiene al menos un año de diferencia
    if ($intervalo->y > 0) {
        return "{$intervalo->y} años";
    }
    // Si tiene al menos un mes de diferencia (pero menos de un año)
    else if ($intervalo->m > 0) {
        return "{$intervalo->m} meses";
    }
    // Si tiene al menos un día de diferencia (pero menos de un mes)
    else if ($intervalo->d > 0) {
        return "{$intervalo->d} días";
    }
    // Si la diferencia es menor a un día (horas o minutos)
    else if ($intervalo->h > 0) {
        return "{$intervalo->h} horas";
    }
    // Si la diferencia es menor a una hora (minutos)
    else if ($intervalo->i > 0) {
        return "{$intervalo->i} minutos";
    }
    // Si la diferencia es menor a un minuto (segundos)
    else {
        return "menos de un minuto";
    }
}






function getColorClass(string $type, $value, string $animalType = "perro"): string
{
    $map = [
        "gender" => [
            1 => "bg-blue-100 text-blue-800",
            0 => "bg-pink-100 text-pink-800",
            // Considera si hay otros valores para género (ej. "unknown", null)
        ],
        "size" => [
            // Definición de tamaños y colores para PERROS (altura en cm)
            "perro" => [
                "small" => "bg-green-100 text-green-800",
                "medium" => "bg-yellow-100 text-yellow-800",
                "large" => "bg-red-100 text-red-800",
                "extra-large" => "bg-purple-100 text-purple-800",
            ],
            "gato" => [
                "small" => "bg-green-100 text-green-800",   // Por ejemplo, altura <= 25 cm
                "medium" => "bg-yellow-100 text-yellow-800",  // Por ejemplo, altura > 25 cm y <= 35 cm
                "large" => "bg-orange-100 text-orange-800",   // Por ejemplo, altura > 35 cm
            ],
        ],
    ];

    // Lógica para determinar la clase de tamaño según la altura y el tipo de animal
    if ($type === "size") {
        $height = (float) $value; // Asegurarse de que el valor sea numérico
        if (is_nan($height)) {
            return "bg-gray-100 text-gray-600"; // Retorna el color por defecto si no es un número
        }

        $sizeDefinitions = $map["size"][$animalType] ?? null;
        if (!$sizeDefinitions) {
            // Si no hay definiciones para ese tipo de animal, retorna por defecto
            return "bg-gray-100 text-gray-600";
        }

        if ($animalType === "perro") { // Changed from "dog" to "perro" to match the map key
            if ($height <= 30) {
                return $sizeDefinitions["small"];
            }
            if ($height <= 60) {
                return $sizeDefinitions["medium"];
            }
            if ($height <= 80) {
                return $sizeDefinitions["large"];
            }
            return $sizeDefinitions["extra-large"]; // Para perros muy grandes
        } elseif ($animalType === "gato") { // Changed from "cat" to "gato" to match the map key
            if ($height <= 25) {
                return $sizeDefinitions["small"];
            }
            if ($height <= 35) {
                return $sizeDefinitions["medium"];
            }
            return $sizeDefinitions["large"]; // Para gatos grandes
        }
    }

    // Si no es el tipo "size", o si la lógica de tamaño no aplicó,
    // acceder al mapa anidado y usar el operador de fusión nula (??) para un valor por defecto.
    return $map[$type][$value] ?? "bg-gray-100 text-gray-600";
}





function buscarColorPorRaza(array $razasArray, string $nombreRazaBuscada): ?string {
    foreach ($razasArray as $raza) {
        // Compara el nombre de la raza (puedes usar strtolower para hacer la búsqueda insensible a mayúsculas/minúsculas)
        if (strtolower($raza['nombre_raza']) === strtolower($nombreRazaBuscada)) {
            return $raza['color']; // Retorna el color tan pronto como lo encuentra
        }
    }
    return null; // Si no se encuentra la raza después de revisar todo el array
}







?>