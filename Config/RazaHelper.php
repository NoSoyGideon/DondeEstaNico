<?php
// Asegúrate de que las constantes de configuración sean accesibles
require_once __DIR__ . '/Config.php'; // Ajusta la ruta según tu estructura
require_once __DIR__ . '/../Models/razas.php'; // Asegúrate de que la ruta a tu clase de conexión sea correcta

function obtenerRazasConColor(): array {
    $razasConColor = [];
    $razas = (new razas())->getRaza();

 

    $numColores = count(COLOR_PALETTE);
    foreach ($razas as $index => $raza) {

       $raza['color'] = COLOR_PALETTE[$index % $numColores]; // Asigna un color de forma cíclica
       $razasConColor[] = $raza;
    }
    
    return $razasConColor;
}


function obtenerRazasDePerros(): array {
    $razasConColor = obtenerRazasConColor();
    $perros = [];
    foreach ($razasConColor as $raza) {
        if (strtolower($raza['especie']) === 'perro') {
            $perros[] = $raza['nombre_raza'];
        }
    }
    return $perros;
}

function obtenerRazasDeGatos(): array {
    $gatos = [];
    $razasConColor = obtenerRazasConColor();
    foreach ($razasConColor as $raza) {
        if (strtolower($raza['especie']) === 'gato') {
            $gatos[] = $raza['nombre_raza'];
        }
    }
    return $gatos;
}

