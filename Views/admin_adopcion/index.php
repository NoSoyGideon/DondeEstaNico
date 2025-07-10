
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/admin.css">

      
    </head>


<body>
<?php include_once(__DIR__ . '/../Templates/header.php');
$_SESSION['setting'] = 2;
$usuario = $data['usuario'] ?? [];
?>  


<div class="admin">
 <div class="sidebar">
<?php include_once(__DIR__ . '/../Templates/menu.php'); ?>

</div>


 <div class="main-content">
   
  </div>

</div>
<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>





    
</body>
</html>

