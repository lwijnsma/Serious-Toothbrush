<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
  </head>
  <body>
    <fieldset>


     <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
       <p>Gebruikersnaam<input type="text" name="user" value="" size="20"></p>
       <p>Wachtwoord<input type="password" name="password" value="" size="20"></p>
       <p><input type="submit" name="" value="login"><a href="register.php">      registeren</a></p>

     </form>

     <?php
     include 'login_script.php';
     ?>
</fieldset>












  </body>

</html>
