<?php

include 'cfg/connection.php';
// controleren of pagina correct is aangeroepen en of er waarden in de velden staan.

if (isset($_POST['user']))
{
    $user       = $_POST['user'];
    $password   = $_POST['password'] ?? null;
    /*
        Tijd voor magie, het viel me op dat er geen check was voor als er geen password was
        dus heb ik een labda toegevoegd, in dit geval ?? dit is nieuw sinds php 7.x
        en geeft iets een waarde stel het heeft geen waarde/bestaat niet.

        Als er nu geen wachtwoord ingevult woord heeft $password de waarde null.
    */

    //$user=htmlspecialchars($_POST['user']);
    //$user=stripslashes ($user);
    //$user=trim($user);
        $user = mysqli_real_escape_string($db, $user);
    /*
        Mysqli escape string haalt al trailing spaties etc. weg
        Daarnaast dealt het met speciale characters.
    */

    /*$query = 	"SELECT * FROM USERS
    WHERE username ='" .$user."'";*/
    $query  = "SELECT * FROM `users` WHERE `username` = '$user';";
    /*
        In PHP als je dubbele quotes gebruikt kun je variabelen toevoegen.
        Daarom is bad practice om ze voor tekst te gebruiken maar is het bijvoorbeeld
        perfect voor de query.
    */

        $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));


        if (mysqli_num_rows($result)==1)
        {
            $result = mysqli_fetch_assoc($result) or die("FOUT : " . mysqli_error($db));


        //hier wordt gekeken of het wachtwoord klopt
            $password = password_verify($password,$result['password']);
            if ($password == 1)
            {
                echo '<div class="alert alert-success" role="alert"> je bent ingelogd </div>';

            $_SESSION["auth"]       = true; //auth controleert of een klant is ingelogd
            $_SESSION["timeout"]    = time() + 120;
            $_SESSION["gebruiker"]  = $user;
            $_SESSION["rol"]        = $result["is_admin"];
            $_SESSION["gerbruiker_informatie"] = $result;



            if ($_SESSION['pages'] == 'Cart')
            {
                $_POST['page']      = 'Cart';
                $_SESSION['pages']  = 'Cart';
                header('location: redirect.php');
            }
            elseif ($_SESSION['pages'] == 'Library')
            {
                $_POST['page']      = 'Library';
                $_SESSION['pages']  = 'Library';
                header('location: redirect.php');
            }
            else
            {
                $_POST['page']      = 'Home';
                $_SESSION['pages']  = 'Home';
                header('location: redirect.php');
            }
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">Gebruikersnaam of wachtwoord niet correct </div>';
            die();
        }
    }
    else
    {
        echo '<div class="alert alert-danger" role="alert">Gebruikersnaam of wachtwoord niet correct </div>';
        die();
    }

}

?>
