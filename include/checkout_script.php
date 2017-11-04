<?php

include 'cfg/connection.php';

$query="SELECT songs.id, songs.title , songs.artiest, songs.price, songs.picture_location, songs.description, songs.file_location, album.title as
'album_title',genre.title as  'genre_title',cart_songs.cart_id FROM `songs`
left join album
on (songs.album_id=album.id)
left join genre
on(songs.genre_id=genre.id)
left join cart_songs
on(songs.id=cart_songs.songs_id)
WHERE cart_songs.cart_id ='{$_SESSION['gebruiker_informatie']['id']}'
ORDER BY songs.title";


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
                $query = "INSERT INTO library_songs (`songs_id`, `libraries_title`, `libraries_users_id`)
                VALUES ('{$song['id']}', 'MAIN LIBRARY', {$_SESSION['gebruiker_informatie']['id']})";
                mysqli_query($db, $query) or die('FOUT : '.mysqli_error($db));
            }

            $query = "
            DELETE FROM `cart_songs`
            WHERE `cart_id` = {$_SESSION['gebruiker_informatie']['id']};
            ";
            mysqli_query($db, $query) or die('FOUT : '.mysqli_error($db));

            //Een klaar bericht laten zien of redirecten.
            //TODO: How fix?
            $_POST['page']      = 'Library';
            $_SESSION['pages']  = 'Library';
            header('location: redirect.php');
        }
        else
        {
            $error = '<br><div class="alert alert-danger" role="alert">voucher code is te klein!</div>';
        }
    }
}
