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
    $query =  "SELECT password, is_admin FROM USERS
    WHERE BINARY username ='" .$user."'";
    $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());


    if (mysqli_num_rows($result)==1)
    {
      $result=mysqli_fetch_assoc($result)or die("FOUT : " . mysqli_error());


      //hier wordt gekeken of het wachtwoord klopt
      $password = password_verify($password,$result['password']);
       if ($password==1)
       {

         echo '<div class="alert alert-success" role="alert"> je bent ingelogd </div>';

          header('location:index.php');

         $_SESSION["auth"]=true; //auth controleert of een klant is ingelogd
         $_SESSION["timeout"]=time() + 120;
         $_SESSION["gebruiker"]=$user;
         $_SESSION["rol"]=$result["is_admin"];

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
