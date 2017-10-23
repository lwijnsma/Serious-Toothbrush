<!DOCTYPE html>
<?php


session_start( );
session_regenerate_id();
?>

<head>
  <title>serious toothbrush</title>
  <meta charset="utf-8">
  <link rel="icon" type="image/ico" href="images/icono-2016.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.css">
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php
include 'include/header.php';
?>
<?php
include 'include/navbarbuttons.php';
?>
<?php

?>
<footer class="footer">
<div class="container">
  <div class="row justify-content-md-center"">
  <p> &copy; <?php echo date("Y"); ?> serious toothbrush</p>
  </div>
  </div>
</footer>
</body>
</html>
