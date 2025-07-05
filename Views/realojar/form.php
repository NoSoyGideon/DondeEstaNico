<?php
// Simulación: razas y colores
$breeds = ['Shiba Inu','Labrador','Bulldog','Bengalí'];
$colors = ['Black','White','Brown','Golden'];
$states = ['Distrito Capital','Miranda','Caracas','Zulia','Carabobo'];
?>

<form action="<?php echo BASE_URL; ?>realojar/cargarIMG" method="POST" enctype="multipart/form-data">



 <div class="upload-container">
    <label for="file-upload" class="custom-upload-button">
      <span class="upload-label">Sube tu imagen</span>
      <svg class="camera-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3l2-3h8l2 3h3a2 2 0 0 1 2 2z"/>
        <circle cx="12" cy="13" r="4"/>
      </svg>
      <img id="preview-image" alt="Preview" />
    </label>
    <input type="file" id="fileInput" accept="image/*" hidden>
  </div>




  <button type="submit">Subir Foto</button>
</form>





<script>
const fileInput = document.getElementById("fileInput");
const previewImg = document.getElementById("preview-image");

fileInput.addEventListener("change", function () {
  const file = this.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = function (e) {
    previewImg.src = e.target.result;
    previewImg.style.display = "block";
  };
  reader.readAsDataURL(file);
});

</script>
