<?php
$current = basename($_SERVER['PHP_SELF']);
function isActive($page) {
    global $current;
    return $current === $page ? 'active' : '';
}
?>


  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="style.css">

<div class="side-panel">
  <ul class="menu">
    <li class="<?php echo isActive('index.php'); ?>">
      <a href="index.php">
        <span class="label">Overview</span>
        <span class="icon"><i data-lucide="home"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive('profile.php'); ?>">
      <a href="profile.php">
        <span class="label">Profile</span>
        <span class="icon"><i data-lucide="user"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive('pets.php'); ?>">
      <a href="pets.php">
        <span class="label">Pets</span>
        <span class="icon"><i data-lucide="paw-print"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive('requests.php'); ?>">
      <a href="requests.php">
        <span class="label">Requests</span>
        <span class="icon"><i data-lucide="mail"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive('donations.php'); ?>">
      <a href="donations.php">
        <span class="label">Donations</span>
        <span class="icon"><i data-lucide="gift"></i></span>
        <span class="ribbon"></span>
      </a>
    </li>
    <li class="<?php echo isActive('historial.php'); ?>">
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

