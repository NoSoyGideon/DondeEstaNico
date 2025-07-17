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
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/admin/superusuario.css">
    <!-- Custom Styles -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="font-['Inter','Arial','Helvetica',sans-serif'] bg-purple-light min-h-screen flex">

<?php include_once(__DIR__ . '/../Templates/sidebar.php');
   $datos = $data['datos'];
?>

<div class="flex-1 p-8">

    <h1 class="text-3xl font-bold text-purple-main mb-8">Bienvenida/o al Dashboard Admin</h1>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-3xl font-bold text-green-main"><?= htmlspecialchars($datos['total_mascotas_adopcion']) ?></h3>
            <p class="text-gray-600">Mascotas registradas</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-3xl font-bold text-green-main"><?= htmlspecialchars($datos['adopciones_ultima_semana']) ?></h3>
            <p class="text-gray-600">Adopciones esta semana</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-3xl font-bold text-green-main"><?= htmlspecialchars($datos['mascota_mas_favorita']) ?></h3>
            <p class="text-gray-600">Mascota Favorita del mes</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-3xl font-bold text-green-main"><?= htmlspecialchars($datos['total_donaciones_mes']) ?>$</h3>
            <p class="text-gray-600">Donaciones del mes</p>
        </div>
    </div>

    <!-- Chart -->
<section class="w-full bg-transparent py-6">
  <div class="flex justify-center space-x-4 mb-6">
    <button
      id="btnAdopciones"
      class="px-6 py-2 rounded-md bg-purple-700 text-white font-semibold cursor-default transition"
    >
      Adopciones Mensuales
    </button>
    <button
      id="btnRegresion"
      class="px-6 py-2 rounded-md bg-purple-300 text-purple-900 font-semibold cursor-pointer transition hover:bg-purple-400"
    >
      Regresión Lineal
    </button>
  </div>

  <div
    id="contenedorAdopciones"
    class="bg-white p-6 rounded-lg shadow-lg mb-10 max-w-4xl mx-auto"
  >
    <h2 class="text-xl font-bold text-purple-700 mb-4">Adopciones Mensuales</h2>
    <canvas id="adoptionsChart" height="100"></canvas>
  </div>

  <div
    id="contenedorRegresion"
    class="hidden bg-white p-6 rounded-lg shadow-lg mb-10 max-w-4xl mx-auto"
  >
    <h2 class="text-xl font-bold text-purple-700 mb-4">Regresión Lineal</h2>
    <canvas id="regressionChart" width="600" height="400"></canvas>
  </div>
</section>
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

                    <?php 
       foreach ($data['mascotas'] as $m): 
                    ?>
                <tr class="border-t">
                    <td class="py-2"><?= htmlspecialchars($m['nombre']) ?></td>
                    <td class="py-2"><?= htmlspecialchars($m['especie']) ?></td>
                    <td class="py-2 text-green-main"><?= htmlspecialchars($m['estado']) ?></td>
                    <td class="py-2">
                        <a href="#" class="text-purple-main hover:underline">Editar</a> |
                        <a href="#" class="text-red-500 hover:underline">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<script>
const ctx = document.getElementById('adoptionsChart').getContext('2d');
const rawDonaciones  = <?php echo json_encode($data['adopciones_mensuales']); ?>;
const MES_NOMBRE = [
    '', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
];
// 🔢 Extraer los últimos 6 meses (asumiendo que rawDonaciones ya viene ordenado por año y mes)
const ultimos6 = rawDonaciones.slice(-6);

// 🧱 Separar en arrays para labels y datos
const labels = ultimos6.map(item => `${MES_NOMBRE[item.mes]} ${item.anio}`);
const valores = ultimos6.map(item => parseInt(item.total_donaciones));

// 🎨 Crear gráfico

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Donaciones',
            data: valores,
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

  const btnAdopciones = document.getElementById('btnAdopciones');
  const btnRegresion = document.getElementById('btnRegresion');
  const contenedorAdopciones = document.getElementById('contenedorAdopciones');
  const contenedorRegresion = document.getElementById('contenedorRegresion');

  btnAdopciones.addEventListener('click', () => {
    contenedorAdopciones.style.display = 'block';
    contenedorRegresion.style.display = 'none';

    btnAdopciones.classList.add('btn-active');
    btnAdopciones.classList.remove('btn-inactive');

    btnRegresion.classList.remove('btn-active');
    btnRegresion.classList.add('btn-inactive');
  });

  btnRegresion.addEventListener('click', () => {
    contenedorAdopciones.style.display = 'none';
    contenedorRegresion.style.display = 'block';

    btnRegresion.classList.add('btn-active');
    btnRegresion.classList.remove('btn-inactive');

    btnAdopciones.classList.remove('btn-active');
    btnAdopciones.classList.add('btn-inactive');
  });


  // 📊 Gráfico de Regresión Lineal
const ctxRegresion = document.getElementById('regressionChart').getContext('2d');
const puntosReales = <?php echo json_encode($data['regresion']['puntos']); ?>;
const lineaRegresion = <?php echo json_encode($data['regresion']['linea']); ?>;

new Chart(ctxRegresion, {
  type: 'scatter',
  data: {
    datasets: [
      {
        label: 'Datos reales',
        data: puntosReales,
        backgroundColor: 'rgba(103, 91, 200, 0.7)',
        borderColor: 'transparent',
        pointRadius: 5
      },
      {
        label: 'Línea de regresión',
        data: lineaRegresion,
        type: 'line',
        borderColor: '#E91E63',
        borderWidth: 2,
        fill: false,
        pointRadius: 0,
        tension: 0
      }
    ]
  },
  options: {
    responsive: true,
    plugins: {
      tooltip: {
        callbacks: {
          label: function(context) {
            const x = context.parsed.x;
            const y = context.parsed.y;
            return `Donaciones: $${x} → Adopciones: ${y}`;
          }
        }
      },
      legend: {
        labels: {
          color: '#333',
          font: {
            weight: 'bold'
          }
        }
      },
      title: {
        display: true,
        text: '<?php echo $data["regresion"]["formula"]; ?>',
        color: '#3d3477',
        font: {
          size: 16,
          weight: 'bold'
        }
      }
    },
    scales: {
      x: {
        title: {
          display: true,
          text: 'Monto Donado (USD)',
          color: '#3d3477',
          font: {
            weight: 'bold'
          }
        }
      },
      y: {
        title: {
          display: true,
          text: 'Mascotas rescatadas',
          color: '#3d3477',
          font: {
            weight: 'bold'
          }
        },
        beginAtZero: true
      }
    }
  }
});

</script>

</body>
</html>
    