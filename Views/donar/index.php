<?php

require_once '../../Config/Config.php';
// paginación simulada
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$totalPages = 3;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/donar.css">
    <script defer src="<?php echo BASE_URL; ?>Assets/js/adopcion.js"></script>

</head>
<body>

  <?php include_once '../Templates/header.php'; ?>
<div class="donation-container">
  <h1>RESCUES</h1>
  <p class="subtitle">Find out more about the rescues and shelters using PetMatch and the amazing work they do.</p>
  <div class="divider"></div>

  <div class="filters">
    <select name="state">
      <option value="">Todos los estados</option>
      <option value="tx">Texas</option>
      <option value="ca">California</option>
    </select>
    <button>Filtrar</button>
  </div>

  <?php include 'rescue_list.php'; ?>

  <div class="pagination">
    <?php for($i=1; $i<= $totalPages; $i++): ?>
      <button class="<?= $i==$page?'active':'' ?>"><?= $i ?></button>
    <?php endfor; ?>
    <button>Last</button>
  </div>
  </div>

 <?php include_once '../Templates/footer.php'; ?>



</body>
</html>