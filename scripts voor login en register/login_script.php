<?php
session_start(); // sessie beginnen
include 'connection.php';
// controleren of pagina correct is aangeroepen en of er waarden in de velden staan.
  if (!empty($_POST)&& $_POST['user']!=""&& $_POST['password']!="")
  {
         $user = mysqli_real_escape_string($db, $_POST['user']);
         $password = mysqli_real_escape_string($db, $_POST['password']);
     //sql query//
     $query = 	"SELECT * FROM USERS
     WHERE username ='" . $user ."'
     AND password='" . $password ."''";


     $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

     if (mysqli_num_rows($result) > 0)
     {
          // gebruikersnaam gevonden, registreer gegevens in session
       $_SESSION["auth"]=true; //auth controleert of een klant is ingelogd
       $_SESSION["timeout"]=time() + 120;
       $_SESSION["gebruiker"]=$gebruiker;
       while($row = mysqli_fetch_assoc($result))
       {
          $roll = $row['is_admin'];
       }
       // Doorsturen naar beveiligde pagina
       if(($roll) == "0")
       {
          header("Location: user_home.php");
          exit();
       }
       elseif(($rol =="1"))
       {
          header("Location: admin.php");
          exit();
       }

    }
    else
    {
        print "gebruikersnaam of wachtwoord niet correct";
       die();

    }
  }
?>
