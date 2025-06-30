

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/overview.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
    </head>
<body>
<?php include_once(__DIR__ . '/../Templates/header.php'); ?>
   <div class="admin-panel">
  <div class="sidebar">
  <?php include_once(__DIR__ . '/menu.php'); ?>


  
</div>
  <div class="content">
    <!-- Sección 1: Perfil empresa -->
    <section class="company-info">
      <div class="logo-container">
        <img src="<?php echo BASE_URL; ?>assets/images/moxy.jpg" alt="Logo empresa" class="company-logo" />
      </div>
      <div class="company-details">
        <h2 class="company-name">Nombre Empresa</h2>
        <div class="company-address">
          <i class="fa fa-map-marker-alt"></i>
          <span>Calle Falsa 123, Ciudad</span>
        </div>
        <ul class="company-stats">
          <li><strong>Rescatistas:</strong> 42</li>
          <li><strong>Refugios:</strong> 3</li>
          <li><strong>Voluntarios:</strong> 27</li>
        </ul>
        <button class="btn-edit">
          <i class="fa fa-edit"></i> Editar perfil
        </button>
      </div>
    </section>

    <!-- Sección 2: Gráfica adopciones -->
    <section class="chart-section">
      <canvas id="adoptionChart" height="150"></canvas>
    </section>

    <!-- Sección 3: Tabla solicitudes -->
    <section class="requests-section">
      <h3>All Requests to adopt Magie</h3>
      <div class="table-wrapper">
        <table class="requests-table">
          <thead>
            <tr>
              <th>Name</th><th>Pet</th><th>Location</th><th>Date Requested</th>
            </tr>
          </thead>
          <tbody>
            <!-- Repite <tr> según datos -->
            <tr>
              <td>
                <img src="https://via.placeholder.com/32" alt="User" class="item-img"/>
                <span>Ana Pérez</span>
              </td>
              <td>
                <img src="https://via.placeholder.com/32" alt="Pet" class="item-img"/>
                <span>Magie</span>
              </td>
              <td>Madrid</td><td>Jun 12</td>
            </tr>
               <tr>
              <td>
                <img src="https://via.placeholder.com/32" alt="User" class="item-img"/>
                <span>Ana Pérez</span>
              </td>
              <td>
                <img src="https://via.placeholder.com/32" alt="Pet" class="item-img"/>
                <span>Magie</span>
              </td>
              <td>Madrid</td><td>Jun 12</td>
            </tr>
               <tr>
              <td>
                <img src="https://via.placeholder.com/32" alt="User" class="item-img"/>
                <span>Ana Pérez</span>
              </td>
              <td>
                <img src="https://via.placeholder.com/32" alt="Pet" class="item-img"/>
                <span>Magie</span>
              </td>
              <td>Madrid</td><td>Jun 12</td>
            </tr>
               <tr>
              <td>
                <img src="https://via.placeholder.com/32" alt="User" class="item-img"/>
                <span>Ana Pérez</span>
              </td>
              <td>
                <img src="https://via.placeholder.com/32" alt="Pet" class="item-img"/>
                <span>Magie</span>
              </td>
              <td>Madrid</td><td>Jun 12</td>
            </tr>
            <!-- más filas... -->
          </tbody>
        </table>
        <div class="fade-overlay"></div>
      </div>
    </section>

    <!-- Sección 4: Cuadrados acciones -->
    <section class="actions-section">
      <div class="action-card">
        <h4>Acción 1</h4>
        <button class="action-btn">Ir</button>
      </div>
      <div class="action-card">
        <h4>Acción 2</h4>
        <button class="action-btn">Ir</button>
      </div>
      <div class="action-card">
        <h4>Acción 3</h4>
        <button class="action-btn">Ir</button>
      </div>
    </section>
  </div>
</div>



<script>
const ctx = document.getElementById('adoptionChart').getContext('2d');
const pastMonths = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'];
const pastData = [12, 15, 9, 20, 18, 22];
const futureMonths = ['Jul', 'Ago'];
const futureData = [24, 26]; // predicción simple

new Chart(ctx, {
  data: {
    labels: pastMonths.concat(futureMonths),
    datasets: [
      {
        type: 'bar',
        label: 'Adopciones reales',
        data: pastData.concat([null, null]),
        backgroundColor: 'rgba(103,91,200,0.7)'
      },
      {
        type: 'bar',
        label: 'Predicción adopciones',
        data: [null, null, null, null, null, null].concat(futureData),
        backgroundColor: 'rgba(103,91,200,0.3)'
      },
      {
        type: 'line',
        label: 'Tendencia futura',
        data: pastData.concat(futureData),
        borderColor: '#675BC8',
        fill: false,
        tension: 0.3
      }
    ]
  },
  options: {
    plugins: {
      tooltip: { mode: 'index', intersect: false },
      datalabels: false
    },
    scales: {
      x: { title: { display: true, text: 'Mes' } },
      y: { title: { display: true, text: 'Adopciones' }, beginAtZero: true }
    }
  }
  

}




);

// Opcional: librería ChartDataLabels para etiquetas
</script>





 <?php include_once '../Templates/footer.php'; ?>





    
</body>
</html>