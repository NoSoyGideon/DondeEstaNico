<?php
// simulando 7 registros
$rescues = array_fill(0, 7, [
  'name' => 'PetMatch Rescue',
  'state' => 'California',
  'logo' => '', // si tienes url colócala aquí
]);
?>

<div class="cards-container">
<?php foreach($rescues as $r): ?>
  <div class="card">
    <div class="logo"></div>
    <div class="favorite">♥</div>
    <div class="name"><?= $r['name'] ?></div>
    <div class="location"><?= $r['state'] ?></div>
    <div class="actions">
      <div class="btn primary">Donar</div>
      <div class="btn outline">Más info</div>
    </div>
  </div>
<?php endforeach; ?>
</div>
