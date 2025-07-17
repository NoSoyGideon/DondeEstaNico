<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEN Rescue</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
       <!-- <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/styles.css"> -->

   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
     <script src="https://cdn.tailwindcss.com"></script>
    <!-- Configuración personalizada de Tailwind para colores específicos -->
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              'purple-main': '#675BC8',
              'purple-dark': '#2E256F',
              'purple-light': '#f3f0ff',
              'purple-text': '#3d3477',
              'black':'#0C0C0C',
              'green-main': '#0A453A'
            }
          }
        }
      }
    </script>


</head>
<body class="font-['Inter','Arial','Helvetica',sans-serif'] bg-white">

    <!-- Incluir el header -->
    <?php include_once 'Templates/header.php'; ?>

  
<section class="relative flex flex-col md:flex-row items-center justify-center w-full min-h-screen pt-16 pb-8 overflow-hidden border-b-4 border-purple-main">

    <div class="flex-1 flex flex-col justify-center gap-4 px-4 sm:px-8 md:ml-12 z-10 max-w-xl text-center md:text-left">
        <h2 class="text-3xl sm:text-4xl text-green-800 font-semibold">
            Tu nuevo mejor amigo te espera
        </h2>
        <h1 class="text-4xl sm:text-5xl font-extrabold">
            <span class="text-purple-main">Adopt</span> <span class="text-purple-text">Buddies</span>
        </h1>
        <p class="text-gray-700 text-lg leading-relaxed">
            Conectamos corazones peludos con hogares amorosos. Explora una variedad de mascotas listas para brindarte alegría y compañía.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start mt-2">
            <a href="<?php echo BASE_URL; ?>adoptar" class="bg-purple-main text-white rounded-lg px-8 py-3 text-base font-medium transition hover:bg-purple-dark shadow-md">
                Adopta
            </a>
            <a href="<?php echo BASE_URL; ?>realojar" class="bg-white text-purple-main border-2 border-purple-main rounded-lg px-8 py-3 text-base font-medium transition hover:bg-purple-light hover:text-purple-dark shadow-md">
                Buscar nuevo hogar
            </a>
        </div>
    </div>

    <div class="flex-1 flex items-center justify-center relative h-full min-h-[400px] md:min-h-screen mt-8 md:mt-0">
        <div class="absolute inset-0 flex items-center justify-center z-0">
            <img 
                src="<?php echo BASE_URL; ?>assets/images/home/bg1Section.png" 
                alt="Un perro y un gato abrazándose, simbolizando la adopción" 
                class="w-full h-auto object-contain max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl 2xl:max-w-2xl transform scale-125 md:scale-140 lg:scale-150"
            >
        </div>
    </div>

</section>
    <!-- section cartas mascota -->
    <section class="py-16 px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- titulo section -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">
                Echa un vistazo a <span class="text-purple-main">Nuestras Mascotas</span>
            </h2>
        </div>

        <!-- grid de cartas mascotas-->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
            <?php 
                foreach ($data['mascotas'] as $m): 
            ?>

<!-- CARD MASCOTA -->


<script defer src="<?php echo BASE_URL; ?>Assets/js/cardMascota.js"></script>
<div class="bg-white rounded-lg shadow-md overflow-hidden w-[300px] h-[580px] flex flex-col"> 
    <div class="relative">
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
           <img class="w-full h-full object-cover" src="<?php echo BASE_URL; ?><?php echo $m['url_foto']; ?>" alt="Shiba Inu">
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
                <span class="text-sm text-gray-600">Genero:</span>
                <span class="text-sm <?= getColorClass('gender', $m['genero']) ?> px-2 py-1 rounded"><?= ($m['genero'] == 1) ? 'Male' : 'Female'; ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Raza:</span>
                <span class="text-sm bg-purple-light text-purple-dark px-2 py-1 rounded"><?= $m['nombre_raza'] ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Edad:</span>
                <span class="text-sm bg-purple-light text-purple-dark px-2 py-1 rounded"><?= procesarFechaYValores($m['fecha_nacimiento'], $m['edad_minima'], $m['edad_maxima']) ?></span>
            </div>
            <div class="flex justify-between">
                <span class="text-sm text-gray-600">Tamaño:</span>
                <span class="text-sm <?= getColorClass('size', $m['altura']) ?> px-2 py-1 rounded"><?= $m['altura'] ?> cm</span>
            </div>
        </div>

        <p class="text-sm text-gray-600 mb-4">
            <?= htmlspecialchars(strlen($m['descripcion']) > 74 ? substr($m['descripcion'], 0, 74) . '...' : $m['descripcion']) ?>
        </p>


        <a href="<?php echo BASE_URL; ?>desc_mascota?id=<?php echo $m['id']; ?>" class=" items-center w-full bg-white border border-purple-main text-purple-main py-2 px-6 rounded hover:bg-purple-light transition-colors">
            Más información
        </a>
    </div>
</div>



          
      <?php endforeach; ?>

        </div>

        <!-- Ver mas boton -->
<div class="text-center">
        <a href="<?php echo BASE_URL; ?>adoptar" class="bg-white border border-purple-main text-purple-main px-6 py-2 rounded hover:bg-purple-light transition-colors inline-block">
        Ver más mascotas
    </a>
</div>
    </div>
    </section>

    <!-- section pasos -->
    <section class="py-16 px-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- titulos -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                Adopta en
            </h2>
            <p class="text-xl text-purple-main font-semibold">
                3 simples pasos
            </p>
        </div>

        <div class="relative">
            <!--lineas conectoras-->
            <div class="hidden md:block absolute top-32 left-1/2 transform -translate-x-1/2 w-full max-w-4xl">
                <div class="flex justify-between items-center px-20">
                    <!-- linea 1-->
                    <div class="flex-1 relative">
                        <svg class="w-full h-8" viewBox="0 0 300 32" fill="none">
                            <path d="M10 16 Q150 8 290 16" stroke="#675BC8" stroke-width="2" stroke-dasharray="8,8" fill="none"/>
                        </svg>
                    </div>
                    <!-- linea 2-->
                    <div class="flex-1 relative ml-8">
                        <svg class="w-full h-8" viewBox="0 0 300 32" fill="none">
                            <path d="M10 16 Q150 8 290 16" stroke="#675BC8" stroke-width="2" stroke-dasharray="8,8" fill="none"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- grid de los pasos -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <!-- paso 1 -->
                <div class="text-center">
                    <!-- numero-->
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-purple-light text-purple-main rounded-full font-bold text-lg mb-6 z-10 relative">
                        1
                    </div>
                    
                    <!-- carta con icono y descripcion-->
                    <div class="w-full h-72 max-w-xs mx-auto bg-white rounded-lg shadow-md border border-gray-200 p-6 flex flex-col items-center">
                        <!-- Icon -->
                        <div class="mb-4">
                            <img src="<?php echo BASE_URL; ?>assets/images/home/1step.svg" alt="Setup Profile" class="w-24 h-24 object-contain">
                        </div>
                        
                        <!-- Descripcion -->
                        <p class="text-black text-sm leading-relaxed">
                            Crea un perfil y completa tu información para que los rehomers puedan conocerte mejor
                        </p>
                    </div>
                </div>

                <!-- paso 2 -->
                <div class="text-center">
                    <!--numero -->
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-purple-light text-purple-main rounded-full font-bold text-lg mb-6 z-10 relative">
                        2
                    </div>
                    
                    <!-- carta con icono y descripcion -->
                    <div class="w-full h-72 max-w-xs mx-auto bg-white rounded-lg shadow-md border border-gray-200 p-6 flex flex-col items-center">
                        <!-- Icon -->
                        <div class="mb-4">
                            <img src="<?php echo BASE_URL; ?>assets/images/home/2step.svg" alt="Describe Home" class="w-24 h-24 object-contain">
                        </div>
                        
                        <!-- Descripcion -->
                        <p class="text-black text-sm leading-relaxed">
                            Describe tu hogar y rutina para que los rehomers puedan ver si es adecuado para su mascota.
                        </p>
                    </div>
                </div>

                <!-- paso 3 -->
                <div class="text-center">
                    <!-- numero -->
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-purple-light text-purple-main rounded-full font-bold text-lg mb-6 z-10 relative">
                        3
                    </div>
                    
                    <!-- carta con icono y descripcion-->
                    <div class="w-full h-72 max-w-xs mx-auto bg-white rounded-lg shadow-md border border-gray-200 p-6 flex flex-col items-center">
                        <!-- Icon -->
                        <div class="mb-4">
                            <img src="<?php echo BASE_URL; ?>assets/images/home/3step.svg" alt="Start Search" class="w-24 h-24 object-contain">
                        </div>
                        
                        <!-- descripcion -->
                        <p class="text-black text-sm leading-relaxed">
                            Comienza tu búsqueda!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- sección de donaciones -->
    <section class="py-16 px-8 bg-purple-light">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-10">
                <!-- Contenido de texto -->
                <div class="flex-1 max-w-lg">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Ayuda a <span class="text-purple-main">Mascotas Necesitadas</span>
                    </h2>
                    <p class="text-black text-lg leading-relaxed mb-6">
                        Tu donación proporciona alimentos, atención médica, refugio y amor a mascotas abandonadas y en situación de vulnerabilidad. Cada pequeño aporte hace una gran diferencia en la vida de estos pequeños amigos.
                    </p>
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center">
                            <div class="inline-flex items-center justify-center w-10 h-10 bg-purple-main text-white rounded-full mr-4">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="text-black">Financiamos tratamientos veterinarios</p>
                        </div>
                        <div class="flex items-center">
                            <div class="inline-flex items-center justify-center w-10 h-10 bg-purple-main text-white rounded-full mr-4">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="text-black">Mejoramos refugios de animales</p>
                        </div>
                        <div class="flex items-center">
                            <div class="inline-flex items-center justify-center w-10 h-10 bg-purple-main text-white rounded-full mr-4">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <p class="text-black">Programas de vacunación y esterilización</p>
                        </div>
                    </div>
                    <a href="<?php echo BASE_URL; ?>donar" class="bg-purple-main text-white rounded-lg px-8 py-3 text-base font-medium transition hover:bg-purple-dark">
                        Donar ahora
                    </a>
                </div>
                
                <!-- Imagen -->
                <div class="flex-1 flex justify-center md:justify-end">
                    <div class="relative w-full max-w-md h-auto rounded-lg overflow-hidden shadow-xl">
                        <img src="<?php echo BASE_URL; ?>assets/images/home/donar.webp" alt="Donaciones para mascotas" class="w-full h-auto object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-purple-dark/80 to-transparent p-6">
                            <p class="text-white font-medium text-lg">Tu generosidad salva vidas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- sección de x-->
     <section class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- lado izquierdo -->
            <div class="text-center lg:text-left">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8">
                    <span class="text-purple-600">Coexistencia Pacífica</span><br>
                    <span class="text-purple-600">Humanos y Animales</span>
                </h2>
                
                <!-- Illustration Placeholder -->
                <div class="relative bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-8 h-80 flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-64 h-48 bg-gray-200 rounded-lg flex items-center justify-center mb-4">
                            <img src="<?php echo BASE_URL; ?>assets/images/home/Pet adoption illustration.svg" alt="Woman with cat & Man with dog illustration">
                        </div>
                    </div>
                </div>
            </div>

            <!-- lado derecho-->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!--relacion emocional -->
                <div class="bg-gray-50 rounded-xl p-6 relative">
                    <div class="flex items-start mb-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2">Relación Emocional</h3>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        El vínculo emocional entre gatos y humanos está profundamente arraigado en el amor incondicional y la compañía que ofrecen los felinos.
                    </p>
                    <div class="absolute bottom-4 right-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center">
                            <span class="text-xs"><img src="<?php echo BASE_URL; ?>assets/images/home/graycat.svg" alt="Cat Icon"></span>
                        </div>
                    </div>
                </div>

                <!-- Comunicacion -->
                <div class="bg-gray-50 rounded-xl p-6 relative">
                    <div class="flex items-start mb-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2">Comunicación</h3>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Los animales pueden comunicarse mejor con las personas en estas condiciones, ya que la comunicación verbal es reemplazada por la no verbal.
                    </p>
                    <div class="absolute bottom-4 right-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center">
                            <span class="text-xs"><img src="<?php echo BASE_URL; ?>assets/images/home/graydog.svg" alt="Dog Icon"></span>
                        </div>
                    </div>
                </div>

                <!-- Niños y mascotas -->
                <div class="bg-gray-50 rounded-xl p-6 relative">
                    <div class="flex items-start mb-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2">Niños y mascotas</h3>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Las mascotas establecen vínculos emocionales con los niños, y la relación resulta positiva en aspectos afectivos, reforzando la personalidad del niño.
                    </p>
                    <div class="absolute bottom-4 right-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center">
                            <span class="text-xs"><img src="<?php echo BASE_URL; ?>assets/images/home/graydog.svg" alt="dog icon"></span>
                        </div>
                    </div>
                </div>

                <!-- salud -->
                <div class="bg-gray-50 rounded-xl p-6 relative">
                    <div class="flex items-start mb-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2">Salud</h3>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Diversos estudios sugieren que tener una mascota puede ayudar a reducir la presión arterial y mejorar la salud cardiovascular.
                    </p>
                    <div class="absolute bottom-4 right-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center">
                            <span class="text-xs"><img src="<?php echo BASE_URL; ?>assets/images/home/graycat.svg" alt="Cat Icon"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     </section>



  <?php include_once 'Templates/footer.php'; ?>


</body>
</html>