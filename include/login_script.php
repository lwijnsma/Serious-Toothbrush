<?php
session_start(); // sessie beginnen
include 'connection.php';
// controleren of pagina correct is aangeroepen en of er waarden in de velden staan.
  if (!empty($_POST)&& $_POST['user']!=""&& $_POST['password']!="")
  {
    //maakt variable
    $user=$_POST['user'];
    $password=$_POST['password'];
    //hier wordt de hash opgehaalt
    $query = 	"SELECT password FROM USERS
    WHERE BINARY username ='" .$user."'";
    $password_result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
    $password_result=mysqli_fetch_assoc($password_result)or die("FOUT : " . mysqli_error());


    //hier wordt gekeken of het wachtwoord klopt
    $password = password_verify($password,$password_result['password']);
     if ($password==1)
     {

       echo '<div class="alert alert-success" role="alert">succesful ingelogd</div>';
       $_SESSION["auth"]=true; //auth controleert of een klant is ingelogd
       $_SESSION["timeout"]=time() + 120;
       $_SESSION["gebruiker"]=$user;
    }
    else
    {
        print '<div class="alert alert-danger" role="alert"> gebruikersnaam of wachtwoord niet correct </div>';
       die();

    }
  }
?>
