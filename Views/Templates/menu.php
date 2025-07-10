

<?php

function isActive($page) {
    
    return $_SESSION['setting'] === $page ? 'active' : '';
}
?>

  <link rel="stylesheet" href="<?php echo BASE_URL; ?>Assets/css/menu.css">

<div class="side-panel">
  <ul class="menu">
    <li class="<?php echo isActive(1); ?>">
      <a href="index.php">
        <span class="label">Overview</span>
        <span class="icon"><i data-lucide="home"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive(2); ?>">
      <a href="profile.php">
        <span class="label">Profile</span>
        <span class="icon"><i data-lucide="user"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive(3); ?>">
      <a href="pets.php">
        <span class="label">Pets</span>
        <span class="icon"><i data-lucide="paw-print"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive(4); ?>">
      <a href="requests.php">
        <span class="label">Requests</span>
        <span class="icon"><i data-lucide="mail"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive(5); ?>">
      <a href="donations.php">
        <span class="label">Donations</span>
        <span class="icon"><i data-lucide="gift"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive(6); ?>">
      <a href="historial.php">
        <span class="label">Historial</span>
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
