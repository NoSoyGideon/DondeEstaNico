<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donación Cancelada - AdoptBuddies</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'purple-primary': '#8B5CF6',
                        'purple-light': '#A78BFA',
                        'purple-lighter': '#C4B5FD',
                        'purple-lightest': '#EDE9FE',
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-purple-lightest to-white min-h-screen">
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Cancel Icon -->
            <div class="bg-yellow-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-8">
                <i class="fas fa-exclamation-triangle text-yellow-600 text-4xl"></i>
            </div>
            
            <!-- Cancel Message -->
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                Donación Cancelada
            </h1>
            <p class="text-xl text-gray-600 mb-8">
                Tu donación ha sido cancelada. No se ha realizado ningún cargo a tu cuenta.
            </p>
            
            <!-- Information Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">¿Qué pasó?</h2>
                <div class="space-y-4 text-left">
                    <div class="flex items-start">
                        <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                        <div>
                            <strong>Proceso cancelado:</strong> Decidiste cancelar el proceso de donación en PayPal.
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-shield-alt text-green-500 mt-1 mr-3"></i>
                        <div>
                            <strong>Sin cargos:</strong> No se ha realizado ningún cargo a tu tarjeta o cuenta.
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-redo text-purple-primary mt-1 mr-3"></i>
                        <div>
                            <strong>Intenta de nuevo:</strong> Puedes intentar realizar la donación nuevamente cuando desees.
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Still Want to Help -->
            <div class="bg-purple-lightest rounded-2xl p-8 mb-8">
                <h3 class="text-2xl font-semibold text-purple-primary mb-4">
                    <i class="fas fa-heart mr-2"></i>
                    ¿Aún Quieres Ayudar?
                </h3>
                <p class="text-gray-700 mb-6">
                    Entendemos que a veces surgen inconvenientes. Hay muchas formas de apoyar a AdoptBuddies:
                </p>
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="bg-white rounded-lg p-4">
                        <i class="fas fa-credit-card text-purple-primary text-2xl mb-2"></i>
                        <h4 class="font-semibold mb-2">Donar Dinero</h4>
                        <p class="text-sm text-gray-600">Intenta la donación nuevamente</p>
                    </div>
                    <div class="bg-white rounded-lg p-4">
                        <i class="fas fa-box text-purple-primary text-2xl mb-2"></i>
                        <h4 class="font-semibold mb-2">Donar Suministros</h4>
                        <p class="text-sm text-gray-600">Mantas, comida, juguetes</p>
                    </div>
                    <div class="bg-white rounded-lg p-4">
                        <i class="fas fa-hands-helping text-purple-primary text-2xl mb-2"></i>
                        <h4 class="font-semibold mb-2">Voluntariado</h4>
                        <p class="text-sm text-gray-600">Dona tu tiempo</p>
                    </div>
                </div>
            </div>
            
            <!-- Common Issues -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">¿Tuviste Problemas?</h3>
                <div class="space-y-3 text-left text-sm">
                    <div class="flex items-start">
                        <i class="fas fa-question-circle text-gray-400 mt-1 mr-3"></i>
                        <div>
                            <strong>Problemas técnicos:</strong> Si experimentaste errores, contacta nuestro soporte.
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-lock text-gray-400 mt-1 mr-3"></i>
                        <div>
                            <strong>Preocupaciones de seguridad:</strong> Todas las donaciones se procesan de forma segura a través de PayPal.
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-phone text-gray-400 mt-1 mr-3"></i>
                        <div>
                            <strong>Necesitas ayuda:</strong> Llámanos al (555) 123-4567 o envía un email a info@adoptbuddies.com
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="index.php" class="bg-purple-primary hover:bg-purple-light text-white font-bold py-3 px-8 rounded-xl transition-colors duration-300">
                    <i class="fas fa-redo mr-2"></i>
                    Intentar Donación Nuevamente
                </a>
                <a href="index.php" class="bg-white hover:bg-gray-50 text-purple-primary font-bold py-3 px-8 rounded-xl border-2 border-purple-primary transition-colors duration-300">
                    <i class="fas fa-home mr-2"></i>
                    Volver al Inicio
                </a>
            </div>
        </div>
    </div>
</body>
</html>