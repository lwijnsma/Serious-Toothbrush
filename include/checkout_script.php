<?php

include 'cfg/connection.php';

$query = "
    SELECT *
    FROM `songs` s
    LEFT JOIN `cart_songs` cs
    ON s.`title` = cs.`songs_title`
    WHERE cs.`cart_id` = {$_SESSION['gerbruiker_informatie']['id']}
    ORDER BY cs.`songs_title`;
";

$songs      = mysqli_query($db, $query) or die('FOUT : '.mysqli_error($db));
$total      = 0;
$checkout   = null;
$error      = '';

if (isset($_POST['submit']))
{
    $checkout   = $_POST['checkout']    ?? null;
    $code       = $_POST['code']        ?? null;

    if ($checkout === 'voucher')
    {
        if (strlen($code) >= 6)
        {
            //Code is goed voeg songs toe.
            while ($song = $songs->fetch_assoc())
            {
                $query = "
                    INSERT INTO `library_songs` (`songs_title`, `libraries_title`, `libraries_users_id`)
                    VALUES (
                        '{$song['title']}',
                        'MAIN LIBRARY',
                        {$_SESSION['gerbruiker_informatie']['id']}
                    );
                ";
                mysqli_query($db, $query) or die('FOUT : '.mysqli_error($db));
            }

            $query = "
                DELETE FROM `cart_songs`
                WHERE `cart_id` = {$_SESSION['gerbruiker_informatie']['id']};
            ";
            mysqli_query($db, $query) or die('FOUT : '.mysqli_error($db));

            //Een klaar bericht laten zien of redirecten.
            //TODO: How fix?
            $_POST['page']      = 'Home';
            $_SESSION['page']   = 'Home';
            header('location: redirect.php');
            exit();
        }
        else
        {
            $error = '<br><div class="alert alert-danger" role="alert">voucher code is te klein!</div>';
        }
    }
}
