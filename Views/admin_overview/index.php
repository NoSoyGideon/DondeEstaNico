<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
$start = microtime(true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
     <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/overview.css">

      
    </head>
<body>
<?php include_once(__DIR__ . '/../Templates/header.php');
$_SESSION['setting'] = 1; ?>  

<?php include_once(__DIR__ . '/../Templates/menu.php'); ?>






<?php include_once(__DIR__ . '/../Templates/footer.php'); ?>





    
</body>
</html>


<?php
$end = microtime(true);
echo "<div style='position:fixed;bottom:10px;right:10px;background:#fff;padding:10px;border:1px solid #ccc;'>Tiempo de carga: " . round(($end - $start), 2) . "s</div>";
?>
