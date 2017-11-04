<?php
include 'cfg/connection.php';

if(!empty($_POST['cart_item_delete']))
{
    $query  = "DELETE FROM cart_songs where cart_id={$_SESSION['gebruiker_informatie']['id']} AND songs_id='{$_POST['cart_item_delete']}';";
    $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));
    $_POST['page']  = "Cart";
    ob_end_clean();
    header("location:redirect.php");
}

$query="SELECT songs.id, songs.title , songs.artiest, songs.price, songs.picture_location, songs.description, songs.file_location, album.title as
'album_title',genre.title as  'genre_title',cart_songs.cart_id FROM `songs`
left join album on (songs.album_id=album.id)
left join genre on(songs.genre_id=genre.id)
left join cart_songs on(songs.id=cart_songs.songs_id)
WHERE cart_songs.cart_id ='{$_SESSION['gebruiker_informatie']['id']}'
ORDER BY songs.title";
$songs = mysqli_query($db, $query) or die('FOUT : '.mysqli_error($db));

/*
    Daarnaast is het ook niet super handig om alle query results "query" te noemen
    dan zie je door de bomen het bos niet meer.
*/

    $total = 0;
    while ($song = $songs->fetch_assoc())
    {
        $id         = $song['id']               ??  'No id';
        $title      = $song['title']            ?? 'No Title';
        $picture    = $song['picture_location'] ?? 'images/song_placeholder.png';
        $album      = $song['album_title']      ?? 'No Album';
        $price      = $song['price']            ?? 0;
        $total      += $price;

        generate_songrow($id, $title, $picture, $album, $price);


    }

    function generate_songrow($id, $title, $picture, $album, $price)
    {
        echo "
        <div class='row'>
        <div class='col'>
        <img class='img-responsive' height='70px' width='100px' src='$picture' />
        </div>

        <div class='col'>
        <h4 class='product-name'>
        <strong>$title</strong>
        <small>$album</small>
        </h4>
        </div>

        <div class='col'>
        <div class='col text-right'>
        <h6><strong>&euro; $price</strong></h6>
        </div>

        <div class='col text-right'>
        <form action='{$_SERVER['PHP_SELF']}' method='POST'>
        <button type='submit' name='cart_item_delete' value='$id' class='btn btn-sm btn-dark'>
        <i class='fa fa-trash fa-2x' aria-hidden='true'></i>
        </button>
        </form>
        </div>
        </div>
        </div>
        ";



        echo "</br></br>";

    }

    ?>
