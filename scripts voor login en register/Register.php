<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>registreren</title>
  </head>
  <body>
    <fieldset>
      <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <p>Voornaam <input type="text"                name="name" value="<?php if(isset($_POST['name'])){echo$_POST['name']; }?>"></p>
        <p>Achternaam <input type="text"              name="lastname" value="<?php if(isset($_POST['lastname'])){echo$_POST['lastname'];}?>"></p>
        <p>Username <input type="text"                name="user" value="<?php if(isset($_POST['user'])){echo$_POST['user'];}?>" size="20"></p>
        <p>email <input type="text"                   name="email" value="<?php if(isset($_POST['email'])){echo$_POST['email'];}?>" size="20p"></p>
        <p>Wachtwoord  <input type="password"         name="password" value="" size="20"></p>
        <p>Wachtwoord opnieuw  <input type="password" name="repassword" value="" size="20"></p>
        <p><input type="submit" name="register" value="registreer"></p>
      </form>
     <?php include 'include/register_script.php'; ?>
    </fieldset>
  </body>
</html>
