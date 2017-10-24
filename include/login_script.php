<?php

include 'cfg/connection.php';
// controleren of pagina correct is aangeroepen en of er waarden in de velden staan.

  if (isset($_POST['user']))
  {
    //maakt variable
    $user=htmlspecialchars($_POST['user']);
    $user=stripslashes ($user);
    $user=trim($user);
    $user = mysqli_real_escape_string($db, $user);

    $password=$_POST['password'];
    //hier wordt de hash opgehaalt
    $query = 	"SELECT * FROM USERS
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



         $_SESSION["auth"]=true; //auth controleert of een klant is ingelogd
         $_SESSION["timeout"]=time() + 120;
         $_SESSION["gebruiker"]=$user;
         $_SESSION["rol"]=$result["is_admin"];
         $_SESSION["gerbruiker_informatie"]=$result;



                  if($_SESSION['pages']=='Cart')
                  {
                  $_POST['page']='Cart';
                  $_SESSION['pages']='Cart';
                  header('location: redirect.php');
                  }
                  elseif($_SESSION['pages']=='Library')
                  {
                  $_POST['page']='Library';
                  $_SESSION['pages']='Library';
                  header('location: redirect.php');
                  }
                  else {
                    $_POST['page']='Home';
                    $_SESSION['pages']='Home';
                    header('location: redirect.php');
                  }
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
