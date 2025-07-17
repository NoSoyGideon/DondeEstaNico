

<?php

function isActive($page) {
    
    return $_SESSION['setting'] === $page ? 'active' : '';
}
?>

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/menu.css">

<div class="side-panel">
  <ul class="menu">
    <li class="<?php echo isActive(1); ?>">
      <a href="<?php echo BASE_URL; ?>perfil">
        <span class="label">Mi perfil</span>
        <span class="icon"><i data-lucide="home"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive(2); ?>">
      <a href="<?php echo BASE_URL; ?>perfil_adopcion">
        <span class="label">Adoptadas</span>
        <span class="icon"><i data-lucide="user"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive(3); ?>">
      <a href="<?php echo BASE_URL; ?>perfil_solicitudes">
        <span class="label">Solicitudes</span>
        <span class="icon"><i data-lucide="user"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>    
  
    <li class="<?php echo isActive(6); ?>">
      <a href="<?= BASE_URL ?>login/logout">
        <span class="label">Cerrar sesión</span>
        <span class="icon"><i data-lucide="clock"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
  </ul>
</div>

<script>
  lucide.createIcons({
    attrs: {
      'stroke-width': 2,
      'width': 20,
      'height': 20,
      'color': '#675BC8'
    }
  });
</script>
