<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdoptBuddies</title>
    <link rel="icon" href="../assets/iconWeb.svg" type="image/x-icon">
    <!-- Fuente Inter de Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
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
    <!-- Incluimos el componente de la barra de navegación -->
    <?php include_once '../inc/navbar.php'; ?>
    

    <!-- Hero Section -->
    <section class="flex items-center justify-center w-full min-h-screen pt-16 pb-8 overflow-hidden">
        <div class="flex-1 max-w-lg flex flex-col justify-center gap-6 px-8 ml-4 md:ml-12 z-10">
            <div class="text-4xl text-green-800 font-semibold mb-2">XXXXXXXXXXXXXXX</div>
            <div class="text-3xl font-extrabold mb-4">
                <span class="text-purple-main">Adopt</span> <span class="text-purple-text">Buddies</span>
            </div>
            <div class="text-gray-800 text-lg leading-relaxed mb-6">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit saepe deleniti illo doloremque eius? Laborum dolores deleniti rem est dolorem
            </div>
            <div class="flex gap-5">
                <button class="bg-purple-main text-white rounded-lg px-8 py-3 text-base font-medium transition hover:bg-purple-dark">Adopta</button>
                <button class="bg-white text-purple-main border-2 border-purple-main rounded-lg px-8 py-3 text-base font-medium transition hover:bg-purple-light">Buscar nuevo hogar</button>
            </div>
        </div>
        <div class="flex-1 flex items-center justify-left relative h-screen">
            <!-- Imagen de fondo hero section -->
            <div class="absolute inset-0 flex items-center justify-left z-0">
                <img src="../assets/bg1Section.png" alt="Decoración" class="w-full h-auto object-contain max-w-3xl transform scale-140">
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
            <!-- Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500 text-sm">Pet Image Placeholder</span>
                    </div>
                    <div class="absolute top-3 left-3 bg-purple-main text-white p-1 rounded">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold text-gray-900">Pitter</h3>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 mb-3">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        California, USA</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Gender:</span>
                            <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded">Male</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Breed:</span>
                            <span class="text-sm bg-red-100 text-red-800 px-2 py-1 rounded">Pit Bull</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Age:</span>
                            <span class="text-sm bg-purple-light text-purple-dark px-2 py-1 rounded">5 years</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Size:</span>
                            <span class="text-sm bg-orange-100 text-orange-800 px-2 py-1 rounded">Large</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Pitter is a friendly, playful, smart male dog. Only adopted to a ho...
                    </p>
                    <button class="w-full bg-white border border-purple-main text-purple-main py-2 px-4 rounded hover:bg-purple-light transition-colors">
                        Más información
                    </button>
                </div>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500 text-sm">Pet Image Placeholder</span>
                    </div>
                    <div class="absolute top-3 left-3 bg-purple-main text-white p-1 rounded">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold text-gray-900">Hero</h3>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 mb-3">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        Texas, USA
                    </div>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Gender:</span>
                            <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded">Male</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Breed:</span>
                            <span class="text-sm bg-gray-100 text-gray-800 px-2 py-1 rounded">DLH</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Age:</span>
                            <span class="text-sm bg-purple-light text-purple-dark px-2 py-1 rounded">2 years</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Size:</span>
                            <span class="text-sm bg-green-100 text-green-800 px-2 py-1 rounded">Small</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Hero is a playful, smart male cat. You can keep him in an apartme...
                    </p>
                    <button class="w-full bg-white border border-purple-main text-purple-main py-2 px-4 rounded hover:bg-purple-light transition-colors">
                        Más información
                    </button>
                </div>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500 text-sm">Pet Image Placeholder</span>
                    </div>
                    <div class="absolute top-3 left-3 bg-purple-main text-white p-1 rounded">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold text-gray-900">Magie</h3>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 mb-3">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        Florida, USA
                    </div>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Gender:</span>
                            <span class="text-sm bg-pink-100 text-pink-800 px-2 py-1 rounded">Female</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Breed:</span>
                            <span class="text-sm bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Shiba Inu</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Age:</span>
                            <span class="text-sm bg-purple-light text-purple-dark px-2 py-1 rounded">37 months</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Size:</span>
                            <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded">Medium</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Magie currently lives with two children age 7 and 13 and has m...
                    </p>
                    <button class="w-full bg-white border border-purple-main text-purple-main py-2 px-4 rounded hover:bg-purple-light transition-colors">
                        Más información
                    </button>
                </div>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="relative">
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500 text-sm">Pet Image Placeholder</span>
                    </div>
                    <div class="absolute top-3 left-3 bg-purple-main text-white p-1 rounded">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold text-gray-900">Felix</h3>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 mb-3">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        New York, USA
                    </div>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Gender:</span>
                            <span class="text-sm bg-pink-100 text-pink-800 px-2 py-1 rounded">Female</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Breed:</span>
                            <span class="text-sm bg-indigo-100 text-indigo-800 px-2 py-1 rounded">Scottish</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Age:</span>
                            <span class="text-sm bg-purple-light text-purple-dark px-2 py-1 rounded">9 Months</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Size:</span>
                            <span class="text-sm bg-green-100 text-green-800 px-2 py-1 rounded">Small</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">
                        Felix is a cute and playful female cat. She loves walking running a...
                    </p>
                    <button class="w-full bg-white border border-purple-main text-purple-main py-2 px-4 rounded hover:bg-purple-light transition-colors">
                        Más información
                    </button>
                </div>
            </div>
        </div>

        <!-- Ver mas boton -->
        <div class="text-center">
            <button class="bg-white border border-purple-main text-purple-main px-6 py-2 rounded hover:bg-purple-light transition-colors">
                Ver más mascotas
            </button>
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
                            <img src="../assets/1step.svg" alt="Setup Profile" class="w-24 h-24 object-contain">
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
                            <img src="../assets/2step.svg" alt="Describe Home" class="w-24 h-24 object-contain">
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
                            <img src="../assets/3step.svg" alt="Start Search" class="w-24 h-24 object-contain">
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
                    <button class="bg-purple-main text-white rounded-lg px-8 py-3 text-base font-medium transition hover:bg-purple-dark">
                        Donar ahora
                    </button>
                </div>
                
                <!-- Imagen -->
                <div class="flex-1 flex justify-center md:justify-end">
                    <div class="relative w-full max-w-md h-auto rounded-lg overflow-hidden shadow-xl">
                        <img src="../assets/donar.webp" alt="Donaciones para mascotas" class="w-full h-auto object-cover">
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
                            <img src="../assets/Pet adoption illustration.svg" alt="Woman with cat & Man with dog illustration">
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
                        The emotional bond between cats and humans is deeply rooted in felines' unconditional love and companionship.
                    </p>
                    <div class="absolute bottom-4 right-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center">
                            <span class="text-xs"><img src="../assets/graycat.svg" alt="Cat Icon"></span>
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
                        Animals can communicate better with people in such conditions, as verbal communication is replaced by non-verbal.
                    </p>
                    <div class="absolute bottom-4 right-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center">
                            <span class="text-xs"><img src="../assets/graydog.svg" alt="Dog Icon"></span>
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
                        Pets establish emotional attachments to children, and the relationship turns out positive in terms of affective aspects, in reinforcement of the child's personality.
                    </p>
                    <div class="absolute bottom-4 right-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center">
                            <span class="text-xs"><img src="../assets/graydog.svg" alt="dog icon"></span>
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
                        Some studies suggest that owning a pet can lower blood pressure and improve heart health.
                    </p>
                    <div class="absolute bottom-4 right-4">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center">
                            <span class="text-xs"><img src="../assets/graycat.svg" alt="Cat Icon"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     </section>

    <!-- incluimos componente Footer -->
    <footer>
        <?php include_once '../inc/footer.php'; ?>
    </footer>
</body>
</html>