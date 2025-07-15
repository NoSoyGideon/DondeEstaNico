
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/contacto.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<?php include_once(__DIR__ . '/../Templates/header.php'); ?>  
<body>


<main class="contact-container">
  <div class="contact-left">
    <h3 class="contact-title">Contactanos</h3>
    Ponte en contacto con nuestro equipo eligiendo el tipo de servicio que estás buscando.
    </p>
    
    <img src="<?php echo BASE_URL; ?>assets/images/contacto.avif" alt="Contacto" class="contact-img">
    
    <div class="contact-info-box">
      <ul>
        <li><i class="fas fa-map-marker-alt"></i> Caracas, Venezuela</li>
        <li><i class="fas fa-phone-alt"></i> +58 424-000-0000</li>
        <li><i class="fas fa-envelope"></i> contacto@denrescue.com</li>
      </ul>
    </div>
  </div>

  <div class="contact-right">
    <form class="contact-form" action="<?php echo BASE_URL; ?>contacto/send" method="POST">
<?php if (isset($_SESSION['form_errors'])): ?>
  <div class="form-errors">
    <ul>
      <?php foreach ($_SESSION['form_errors'] as $error): ?>
        <li><?php echo htmlspecialchars($error); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php unset($_SESSION['form_errors']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['form_success'])): ?>
  <div class="form-success">
    <?php echo htmlspecialchars($_SESSION['form_success']); ?>
  </div>
  <?php unset($_SESSION['form_success']); ?>
<?php endif; ?>

      <h3 class="form-title">
        Listos para ayudarte <i class="fas fa-paw paw-icon"></i>
      </h3>

      <label for="name">Nombre</label>
      <input type="text" id="name" placeholder="Ingresa tu nombre" name="name" required>

      <label for="email">Email</label>
      <input type="email" id="email" placeholder="Ingresa tu email" name="email" required>

      <label for="phone">Número de Teléfono</label>
      <input type="tel" id="phone" placeholder="Ingresa tu número de teléfono" name="phone" required>

      <label for="message">Mensaje</label>
      <textarea id="message" rows="5" placeholder="Escribe tu mensaje..." name="message" required></textarea>

      <button type="submit" class="btn-send">Enviar</button>
    </form>
  </div>
</main>

<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>





    
</body>
</html>