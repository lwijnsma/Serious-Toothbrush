<?php
session_start(); // sessie beginnen
include 'cfg/connection.php';
// controleren of pagina correct is aangeroepen en of er waarden in de velden staan.
  if (!empty($_POST)&& $_POST['user']!="")
  {
    //maakt variable
    $user=htmlspecialchars($_POST['user']);
    $user=stripslashes ($user);
    $user=trim($user);
    $user = mysqli_real_escape_string($db, $user);
    $password=$_POST['password'];
    //hier wordt de hash opgehaalt
    $query =  "SELECT password FROM USERS
    WHERE BINARY username ='" .$user."'";
    $password_result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
    if (mysqli_num_rows($password_result)==1)
    {
      $password_result=mysqli_fetch_assoc($password_result)or die("FOUT : " . mysqli_error());
      //hier wordt gekeken of het wachtwoord klopt
      $password = password_verify($password,$password_result['password']);
       if ($password==1)
       {
         $query_roll =  "SELECT is_admin FROM USERS
         WHERE BINARY username ='" .$user."'";
         $roll_result = mysqli_query($db, $query_roll) or die("FOUT : " . mysqli_error());
         $roll_result=mysqli_fetch_assoc($roll_result)or die("FOUT : " . mysqli_error());
         echo '<div class="alert alert-success" role="alert"> je bent ingelogd </div>';
         $_SESSION["auth"]=true; //auth controleert of een klant is ingelogd
         $_SESSION["timeout"]=time() + 120;
         $_SESSION["gebruiker"]=$user;
         $_SESSION["rol"]=$roll_result["is_admin"];
       }
       else
       {
         echo '<div class="alert alert-danger" role="alert">Gebruikersnaam of wachtwoord niet correct </div>';
          die();
     }
   }
     else {
       echo '<div class="alert alert-danger" role="alert">Gebruikersnaam of wachtwoord niet correct </div>';
       die();
     }
  }
?>