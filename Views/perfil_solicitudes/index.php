
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/admin.css">
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/admin2 copy.css">

      
    </head>


<body>
  <?php include_once(__DIR__ . '/../Templates/header.php');
    $_SESSION['setting'] = 3;
    $usuario = $data['usuario'] ?? [];
  ?>  
  <div class="admin">
    <div class="sidebar">
    <?php include_once(__DIR__ . '/../Templates/menu.php'); ?>
    </div>
    <div class="main-content">



   <h1 class="titulo-seccion">Mascotas en Adopción</h1>
    
    <div class="filtros-container">
        <input type="text" class="filtro-input" placeholder="Buscar por nombre">
        <select class="filtro-input">
            <option value="">Todas las especies</option>
            <option value="perro">Perro</option>
            <option value="gato">Gato</option>
        </select>
        <select class="filtro-input">
            <option value="">Cualquier tamaño</option>
            <option value="pequeno">Pequeño</option>
            <option value="mediano">Mediano</option>
            <option value="grande">Grande</option>
        </select>
        <button class="filtro-boton">Aplicar Filtros</button>
    </div>


   <div class="lista-mascotas">
       <?php foreach ($data['mascotas'] as $mascota): ?>
        <!-- Ejemplo de mascota 1 -->
        <div class="mascota-card">
            <img src="<?php echo $mascota['url_foto']; ?>" alt="Mascota" class="mascota-imagen">
            <div class="mascota-info">
                 <?php
        $especie = strtolower(trim($mascota['especie']));
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
                <div class="mascota-dato">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                    </svg>
                    ID: <?php echo $mascota['id']; ?>
                </div>
                <div class="mascota-dato">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                    <?php echo $mascota['nombre']; ?>
                </div>
                <div class="mascota-dato">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>
                    </svg>
                    <?php echo $mascota['nombre_raza']; ?>
                </div>
                <div class="mascota-dato">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/>
                    </svg>
                    <?= procesarFechaYValores($mascota['fecha_nacimiento'], $mascota['edad_minima'], $mascota['edad_maxima']) ?>
                </div>
                <div class="mascota-dato">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M3 5v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.11 0-2 .9-2 2zm12 4c0 1.66-1.34 3-3 3s-3-1.34-3-3 1.34-3 3-3 3 1.34 3 3zm-9 8c0-2 4-3.1 6-3.1s6 1.1 6 3.1v1H6v-1z"/>
                    </svg>
                    <?= $mascota['altura'] ?> cm
                </div>
            </div>
            <a href="<?php echo BASE_URL; ?>editar?id=<?php echo $mascota['id']; ?>" class="ver-mas-btn">Ver más</a>

   
        </div>
       

      <?php endforeach; ?>
 </div>

    </div>

  </div>
  <?php include_once(__DIR__ . '/../Templates/footer.php'); ?>





    
</body>
</html>

