<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - DEN Rescue</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
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

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="style/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="font-['Inter','Arial','Helvetica',sans-serif'] bg-purple-light min-h-screen flex">

<?php include_once __DIR__ . '/../template/sidebar.php'; ?>

<div class="flex-1 p-8">

    <h1 class="text-3xl font-bold text-purple-main mb-8">Bienvenida/o al Dashboard Admin</h1>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-3xl font-bold text-green-main">12</h3>
            <p class="text-gray-600">Mascotas registradas</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-3xl font-bold text-green-main">5</h3>
            <p class="text-gray-600">Adopciones esta semana</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-3xl font-bold text-green-main">20</h3>
            <p class="text-gray-600">Usuarios registrados</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-3xl font-bold text-green-main">3</h3>
            <p class="text-gray-600">Reportes pendientes</p>
        </div>
    </div>

    <!-- Chart -->
    <div class="bg-white p-6 rounded-lg shadow mb-10">
        <h2 class="text-xl font-bold text-purple-main mb-4">Adopciones Mensuales</h2>
        <canvas id="adoptionsChart" height="100"></canvas>
    </div>

    <!-- Recent Pets Table -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold text-purple-main mb-4">Últimas Mascotas Registradas</h2>
        <table class="w-full text-left">
            <thead>
                <tr>
                    <th class="pb-2">Nombre</th>
                    <th class="pb-2">Especie</th>
                    <th class="pb-2">Estado</th>
                    <th class="pb-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="py-2">Rocky</td>
                    <td class="py-2">Perro</td>
                    <td class="py-2 text-green-main">Disponible</td>
                    <td class="py-2">
                        <a href="#" class="text-purple-main hover:underline">Editar</a> |
                        <a href="#" class="text-red-500 hover:underline">Eliminar</a>
                    </td>
                </tr>
                <tr class="border-t">
                    <td class="py-2">Luna</td>
                    <td class="py-2">Gato</td>
                    <td class="py-2 text-purple-main">En Adopción</td>
                    <td class="py-2">
                        <a href="#" class="text-purple-main hover:underline">Editar</a> |
                        <a href="#" class="text-red-500 hover:underline">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<script>
const ctx = document.getElementById('adoptionsChart').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
        datasets: [{
            label: 'Adopciones',
            data: [5, 10, 7, 12, 8, 15],
            backgroundColor: '#675BC8'
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
