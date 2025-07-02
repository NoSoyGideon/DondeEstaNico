
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
    <h3 class="contact-title">Contact Us</h3>
    <p class="contact-text">
      Get in touch with our team by choosing what kind of our services you are looking for.
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
    <form class="contact-form">
      <h3 class="form-title">
        Ready to help you <i class="fas fa-paw paw-icon"></i>
      </h3>

      <label for="name">Name</label>
      <input type="text" id="name" placeholder="Enter your name" required>

      <label for="email">Email</label>
      <input type="email" id="email" placeholder="Enter your email" required>

      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" placeholder="Enter your phone number">

      <label for="message">Message</label>
      <textarea id="message" rows="5" placeholder="Write your message..."></textarea>

      <button type="submit" class="btn-send">Send</button>
    </form>
  </div>
</main>

<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>





    
</body>
</html>