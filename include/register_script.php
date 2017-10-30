<?php
include 'cfg/connection.php';
// controleren of pagina correct is aangeroepen en of er waarden in de velden staan.
if (isset($_POST['register']))
{
    if (!empty($_POST)&& $_POST['user']!=""&& $_POST['password']!=""&& $_POST['repassword']!=""&& $_POST['name']!="" )
    {
        $user       = mysqli_real_escape_string($db, $_POST['user']);
        $email      = mysqli_real_escape_string($db, $_POST['email']);
        $name       = mysqli_real_escape_string($db, $_POST['name']);
        $last_name  = mysqli_real_escape_string($db, $_POST['lastname']);
        $password   = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $password   = mysqli_real_escape_string($db, $password);
        $IS_ADMIN   = mysqli_real_escape_string($db, 0);

        $query  =   "SELECT * FROM `users` WHERE `username` = '$user';";
        //dit geeft aan of username bestaat
        $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            if ($_POST['password'] === $_POST['repassword'])
            {
                if (strlen($password) > 6 )
                {
                    if (mysqli_num_rows($result) == 0)
                    {
                        $query1 =   "
                            INSERT INTO `users`
                            (USERNAME,EMAIL,FIRST_NAME,LAST_NAME,PASSWORD,IS_ADMIN,CREATED_AT,UPDATED_AT)
                            VALUES
                            ('$user','$email','$name','$last_name','$password','$IS_ADMIN','".date('Y-m-d')."','".date('Y-m-d')."')
                        ";

                        mysqli_query($db, $query1) or die("FOUT : " . mysqli_error());

                        echo '<div class="alert alert-success" role="alert">uw bent geregistreed</div>';

                        include 'include/setting_up_account.php';

                        $_POST['page']      = 'Login';
                        $_SESSION['pages']  = 'Login';
                        header('location: redirect.php');
                    }
                }
            }
        }

        if (mysqli_num_rows($result) != 0)
        {
            echo '<div class="alert alert-danger" role="alert">Deze gebruikersnaam Bestaat al</div>';
        }



        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            echo '<div class="alert alert-danger" role="alert">email is niet correct</div>';
        }

        if ($_POST['password'] != $_POST['repassword'] && strlen($_POST['password']) > 6)
        {
            print '<div class="alert alert-danger" role="alert">wachtwoorden zijn niet gelijk</div>';
        }

        if (strlen($_POST['password']) < 6)
        {
            print '<div class="alert alert-danger" role="alert">wachtwoord te kort</div>';
        }

    }
    else
    {
        print '<div class="alert alert-danger" role="alert"> Alle velden moeten worden ingevuld</div>';
    }
}

?>
