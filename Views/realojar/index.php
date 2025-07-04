<?php
// Simulación: razas y colores
$breeds = ['Shiba Inu','Labrador','Bulldog','Bengalí'];
$colors = ['Black','White','Brown','Golden'];
$states = ['Distrito Capital','Miranda','Caracas','Zulia','Carabobo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/rehome.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<?php include_once(__DIR__ . '/../Templates/header.php'); ?>
<div class="container">
  
  <!-- Section 1 -->
  <div class="section">
    <div class="progress-bar">
      <div class="progress"></div>
      <div class="marker"><svg viewBox="0 0 24 24"><path d="M12 2L15 8H9l3-6z"/></svg></div>
    </div>
    <p>Paso <strong>1</strong> de <strong>4</strong>: Información inicial</p>
  </div>

  <!-- Section 2 -->
  <div class="section" id="section-2">
    <?php if(isset($_SESSION['nombre'])): ?>
      <div class="auth-view" id="auth-view">
        <h2>Hola, <?= htmlspecialchars($_SESSION['nombre']) ?>!</h2>
        <p class="sub"><?= htmlspecialchars($_SESSION['correo']) ?></p>
        <p class="sub">¡Gracias por rehomear con nosotros!</p>
        <label><input type="checkbox" id="agree"> Acepto los<a href="#">Términos & Privacidad</a><span class="required">*</span></label>
        <button class="btn btn-primary" id="startBtn" disabled>Start</button>
      </div>

      <form id="petForm" method="POST" enctype="multipart/form-data" action="<?= BASE_URL ?>realojar/guardar">


        <?php
        foreach (['nombre'=>'Nombre de la mascota','edad'=>'Edad (años)'] as $name=>$label): ?>
          <div class="form-field">
            <label><?= $label ?><span class="required">*</span></label>
            <input type="text" name="<?= $name ?>" required>
          </div>
        <?php endforeach; ?>
        <?php foreach (['Altura (cm)'=>'height','Peso (kg)'=>'weight'] as $label=>$name): ?>
          <div class="form-field">
            <label><?= $label ?><span class="required">*</span></label>
            <input type="number" name="<?= $name ?>" required>
          </div>
        <?php endforeach; ?>

        <div class="form-field"><label>Género<span class="required">*</span></label><select name="gender" required><option value="">Seleccionar</option><option>Hombre</option><option>Mujer</option></select></div>
        <div class="form-field"><label>Raza<span class="required">*</span></label><select name="breed" required><option value="">Seleccionar</option><?php foreach($breeds as $b): ?><option><?= htmlspecialchars($b)?></option><?php endforeach; ?></select></div>
        <div class="form-field"><label>Color<span class="required">*</span></label><select name="color" required><option value="">Seleccionar</option><?php foreach($colors as $c): ?><option><?= htmlspecialchars($c)?></option><?php endforeach; ?></select></div>
        <div class="form-field"><label>Estado (Venezuela)<span class="required">*</span></label><select name="state" required><option value="">Seleccionar</option><?php foreach($states as $s): ?><option><?= htmlspecialchars($s)?></option><?php endforeach; ?></select></div>
        <div class="form-field"><label>Dirección</label><input type="text" name="address"></div>

        <div class="form-field">
          <label>Comparte sobre tu mascota</label>
          <textarea name="notes" placeholder="Tu mascota será visible al público..."></textarea>
        </div>

        <div class="form-field">
          <label>Fotos (una obligatoria)</label>
          <div class="upload-grid">
            <?php for($i=1;$i<=4;$i++): ?>
              <div class="upload-box">
                <input type="file" name="photo<?= $i ?>" <?= $i===1?'required':''?> accept="image/*">
                <div><p><?= $i===1?'Main':'Foto '.$i?></p><svg viewBox="0 0 24 24"><path d="M5 3h14a2 2 0 012 2v14a2..."/></svg></div>
              </div>
            <?php endfor; ?>
          </div>
        </div>

        <div class="footer">
          <button type="button" class="btn btn-back" id="backBtn">Back</button>
          <button type="submit" class="btn btn-secondary">Continue</button>
        </div>
      </form>

    <?php else: ?>
      <div class="auth-view">
        <img src="https://via.placeholder.com/120" alt="Registrarse">
        <p class="sub">Debes registrarte para rehomear una mascota</p>
        <button class="btn btn-primary" disabled>Start</button>
      </div>
    <?php endif; ?>
  </div>
</div>

<script>
  const agree = document.getElementById('agree');
  const startBtn = document.getElementById('startBtn');
  const authView = document.getElementById('auth-view');
  const form = document.getElementById('petForm');
  agree?.addEventListener('change', () => startBtn.disabled = !agree.checked);
  startBtn?.addEventListener('click', () => {
    authView.style.display = 'none';
    form.style.display = 'block';
    window.scrollTo({top: form.offsetTop, behavior:'smooth'});
  });

  document.querySelectorAll('.upload-box input[type="file"]').forEach(input => {
  input.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function(ev) {
        const parent = input.parentElement;
        parent.innerHTML = `<img src="${ev.target.result}" alt="preview">`;
        parent.appendChild(input); // volvemos a añadir el input invisible para seguir funcionando
      };
      reader.readAsDataURL(file);
    }
  });
});
</script>



    
</body>
</html>