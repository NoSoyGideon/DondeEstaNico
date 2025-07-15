<?php


function buscar_mascotas(array $etiquetas = [], array $filtros = []): array {
    $mysqli = new mysqli("localhost", "root", "", "dendb");
    if ($mysqli->connect_errno) return [];

    $mysqli->set_charset("utf8mb4");

    $sql = "
        SELECT 
            m.id, m.nombre, m.especie, m.fecha_nacimiento, m.descripcion, m.estatus, m.color,
            m.peso, m.altura, m.genero, m.edad_minima, m.edad_maxima,
            r.nombre_raza, m.estado, f.url_foto,
            COUNT(me.etiqueta_id) AS coincidencias
        FROM mascota m
        LEFT JOIN razas r ON m.raza_id = r.id
        LEFT JOIN mascota_fotos f ON f.mascota_id = m.id AND f.orden = 1
        LEFT JOIN mascota_etiquetas me ON m.id = me.mascota_id
        LEFT JOIN etiquetas e ON e.id = me.etiqueta_id
    ";

    $condiciones = [];
    $parametros = [];
    $tipos = "";

    // === Filtros por atributos ===
    if (!empty($filtros['especie'])) {
        $condiciones[] = "m.especie = ?";
        $tipos .= "s";
        $parametros[] = $filtros['especie'];
    }

    if (!empty($filtros['tamaño'])) {
        $condiciones[] = "m.altura <= ? AND m.altura >= ?";
        $tipos .= "dd";
        switch ($filtros['tamaño']) {
            case 'pequeño':
                $parametros[] = 35;
                $parametros[] = 0;
                break;
            case 'mediano':
                $parametros[] = 50;
                $parametros[] = 36;
                break;
            case 'grande':
                $parametros[] = 300;
                $parametros[] = 51;
                break;
        }
    }

    if (!empty($filtros['color'])) {
        $condiciones[] = "m.color LIKE ?";
        $tipos .= "s";
        $parametros[] = "%" . $filtros['color'] . "%";
    }

    if (!empty($filtros['estatus'])) {
        $condiciones[] = "m.estatus = ?";
        $tipos .= "s";
        $parametros[] = $filtros['estatus'];
    }

    if (isset($filtros['genero']) && $filtros['genero'] !== '') {
        $condiciones[] = "m.genero = ?";
        $tipos .= "i";
        $parametros[] = (int)$filtros['genero']; // 1: macho, 0: hembra
    }

    if (!empty($filtros['estado'])) {
        $condiciones[] = "m.estado = ?";
        $tipos .= "s";
        $parametros[] = $filtros['estado'];
    }

    if (!empty($filtros['raza'])) {
        $condiciones[] = "r.nombre_raza = ?";
        $tipos .= "s";
        $parametros[] = (string)$filtros['raza'];
    }

    if (!empty($filtros['edad_min'])) {
        $condiciones[] = "m.edad_minima >= ?";
        $tipos .= "i";
        $parametros[] = (int)$filtros['edad_min'];
    }

    if (!empty($filtros['edad_max'])) {
        $condiciones[] = "m.edad_maxima <= ?";
        $tipos .= "i";
        $parametros[] = (int)$filtros['edad_max'];
    }

    if (!empty($condiciones)) {
        $sql .= " WHERE " . implode(" AND ", $condiciones);
    }

    $sql .= " GROUP BY m.id";

    // === Filtro por etiquetas ===
    if (!empty($etiquetas)) {
        $placeholders = str_repeat("?,", count($etiquetas) - 1) . "?";
        $sql .= " HAVING SUM(e.etiqueta IN ($placeholders)) >= 1";
        $sql .= " ORDER BY coincidencias DESC";
        $tipos .= str_repeat("s", count($etiquetas));
        foreach ($etiquetas as $et) {
            $parametros[] = $et;
        }
    } else {
        $sql .= " ORDER BY m.id DESC";
    }

    $stmt = $mysqli->prepare($sql);
    if (!$stmt) return [];

    if (!empty($parametros)) {
        $stmt->bind_param($tipos, ...$parametros);
    }

    $stmt->execute();
    $res = $stmt->get_result();
    $mascotas = [];
    while ($fila = $res->fetch_assoc()) {
        $mascotas[] = $fila;
    }

    return $mascotas;
}


// header("Content-Type: application/json");

// // 🔧 Conexión a la base de datos
// $mysqli = new mysqli("localhost", "root", "", "dendb");
// if ($mysqli->connect_errno) {
//     http_response_code(500);
//     echo json_encode(["error" => "Error de conexión: " . $mysqli->connect_error]);
//     exit;
// }
// $mysqli->set_charset("utf8mb4");

// // 🧾 Recibir datos del cliente (JSON)
// $input = json_decode(file_get_contents("php://input"), true);
// $etiquetas = $input['etiquetas'] ?? []; // array de etiquetas (opcional)
// $filtros = $input['filtros'] ?? [];     // array asociativo de otros filtros

// // 🛠 Construir consulta base
// $sql = "
//     SELECT 
//         m.id, m.nombre, m.especie, m.descripcion, m.estatus, m.color,
//         m.peso, m.altura, m.genero, m.edad_minima, m.edad_maxima,
//         r.nombre_raza, f.url_foto,
//         COUNT(me.etiqueta_id) AS coincidencias
//     FROM mascota m
//     LEFT JOIN razas r ON m.raza_id = r.id
//     LEFT JOIN mascota_fotos f ON f.mascota_id = m.id AND f.orden = 1
//     LEFT JOIN mascota_etiquetas me ON m.id = me.mascota_id
//     LEFT JOIN etiquetas e ON e.id = me.etiqueta_id
// ";

// // 🧩 Condiciones dinámicas
// $condiciones = [];
// $parametros = [];
// $tipos = "";

// // Filtros directos por atributos
// if (!empty($filtros['especie'])) {
//     $condiciones[] = "m.especie = ?";
//     $tipos .= "s";
//     $parametros[] = $filtros['especie'];
// }
// if (!empty($filtros['tamaño'])) {
//     $condiciones[] = "m.altura <= ?" . " AND m.altura >= ?";
//     $tipos .= "dd";
//     switch ($filtros['tamaño']) {
//         case 'pequeño':
//             $parametros[] = 35; $parametros[] = 0;
//             break;
//         case 'mediano':
//             $parametros[] = 50; $parametros[] = 36;
//             break;
//         case 'grande':
//             $parametros[] = 300; $parametros[] = 51;
//             break;
//     }
// }
// if (!empty($filtros['color'])) {
//     $condiciones[] = "m.color LIKE ?";
//     $tipos .= "s";
//     $parametros[] = "%" . $filtros['color'] . "%";
// }
// if (!empty($filtros['estatus'])) {
//     $condiciones[] = "m.estatus = ?";
//     $tipos .= "s";
//     $parametros[] = $filtros['estatus'];
// }

// // Agregar condiciones al SQL si hay
// if (!empty($condiciones)) {
//     $sql .= " WHERE " . implode(" AND ", $condiciones);
// }

// // Agrupar y contar coincidencias con etiquetas
// $sql .= "
//     GROUP BY m.id
// ";

// // Filtrar por etiquetas (si se enviaron)
// if (!empty($etiquetas)) {
//     $etiquetaPlaceholders = str_repeat("?,", count($etiquetas) - 1) . "?";
//     $sql .= "
//     HAVING SUM(e.etiqueta IN ($etiquetaPlaceholders)) >= 1
//     ORDER BY coincidencias DESC
//     ";
//     $tipos .= str_repeat("s", count($etiquetas));
//     foreach ($etiquetas as $etiqueta) {
//         $parametros[] = $etiqueta;
//     }
// } else {
//     $sql .= " ORDER BY m.id DESC";
// }

// // 🔍 Preparar consulta
// $stmt = $mysqli->prepare($sql);
// if (!$stmt) {
//     http_response_code(500);
//     echo json_encode(["error" => "Error al preparar consulta: " . $mysqli->error]);
//     exit;
// }

// // Vincular parámetros si existen
// if (!empty($parametros)) {
//     $stmt->bind_param($tipos, ...$parametros);
// }

// // Ejecutar y recoger resultados
// $stmt->execute();
// $resultado = $stmt->get_result();

// $mascotas = [];
// while ($fila = $resultado->fetch_assoc()) {
//     $mascotas[] = $fila;
// }

// echo json_encode($mascotas);
