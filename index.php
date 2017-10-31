<!DOCTYPE html>
<?php
    session_start( );
    session_regenerate_id();
?>
<?php

if (isset($_POST['holycookies']))
{

if(!isset($_COOKIE["freecookies"]))
{
setcookie("freecookies",time()+3600);
header('location:redirect.php');
}
}
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
        <link rel="stylesheet" href="css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </head>

    <body>
      <?php
      if (!isset($_COOKIE['freecookies'])) {

  echo '<div class="alert alert-info">
        <div class="text-center ">
          <form class="" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
            <p>dont forget to brush your teeth after this delicious cookie
            <button class="btn btn-sm btn-primary " type="submit" name="holycookies">yum!!</button></p>
          </form>
        </div>
      </div>';}   ?>


    <?php
        include 'include/header.php';
        include 'include/navbarbuttons.php';
    ?>

    <footer class="footer">
        <div class="container">
            <div class="row justify-content-md-center">
                <p> &copy; <?php echo date("Y"); ?> serious toothbrush</p>
            </div>
        </div>
    </footer>
    </body>
</html>
