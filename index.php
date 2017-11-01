<!DOCTYPE html>
<?php
session_start();
session_regenerate_id();
?>
<html>
<head>
  <title>serious toothbrush</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/ico" href="images/icono-2016.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.css">
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
  include 'include/navbar.php';
  include 'include/nav_switch.php';
  ?>
</div>
<br>
<footer class="footer" style="background-color: black;">
  <div class="text-center">
    &copy; <?php echo date("Y"); ?> serious toothbrush
  </div>
</footer>
</body>
</html>
