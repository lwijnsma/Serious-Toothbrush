<?php
include 'cfg/connection.php';

if(!empty($_POST['cart_item_delete']))
{
    $query  = "DELETE FROM cart_songs where `cart_id`={$_SESSION['gerbruiker_informatie']['id']} AND `songs_title`='{$_POST['cart_item_delete']}';";
    $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));
    $_POST['page']  = "Cart";
    ob_end_clean();
    header("location:redirect.php");
}

/*$query="SELECT * FROM songs
LEFT JOIN cart_songs
ON songs.title = cart_songs.songs_title
WHERE cart_songs.cart_id = ".$_SESSION['gerbruiker_informatie']['id']."
ORDER BY songs_title";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());*/

/*
    Oke, dat was een groote blok code waar ik even de weg van kwijt raakte.
    het is geen overkill om een query over meerdere lijnen te schrijven
    zodat het nog leesbaar blijft voor anderen.
*/

    $query = "
    SELECT *
    FROM `songs` s
    LEFT JOIN `cart_songs` cs
    ON s.`title` = cs.`songs_title`
    WHERE cs.`cart_id` = {$_SESSION['gerbruiker_informatie']['id']}
    ORDER BY cs.`songs_title`;
    ";

    $songs = mysqli_query($db, $query) or die('FOUT : '.mysqli_error($db));

/*
    Daarnaast is het ook niet super handig om alle query results "query" te noemen
    dan zie je door de bomen het bos niet meer.
*/

    $total = 0;
    while ($song = $songs->fetch_assoc())
    {
        $title      = $song['songs_title']      ?? 'No Title';
        $picture    = $song['picture_location'] ?? 'images/song_placeholder.png';
        $album      = $song['album_title']      ?? 'No Album';
        $price      = $song['price']            ?? 0;
        $total      += $price;

        generate_songrow($title, $picture, $album, $price);

    /*
        Oke, omdat het vrij spammy werd en ik me herrinder dat iemand wou dat we functies toevoegen:
        een functie om de lap HTML te genereren gebasseerd op de variabelen.
        Ook een fallback gebouwd voor het geval er geen prijs, plaatje title etc. is.
    */
    }

    function generate_songrow($title, $picture, $album, $price)
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
        <button type='submit' name='cart_item_delete' value='$title' class='btn btn-sm btn-dark'>
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