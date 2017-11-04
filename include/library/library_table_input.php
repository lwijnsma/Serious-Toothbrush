<?php include 'cfg/connection.php';



if(!empty($_POST['library_search']))
{
    $search = htmlspecialchars($_POST['library_search']);
    $search = stripslashes ($search);
    $search = trim($search);
    $search = mysqli_real_escape_string($db, $search);
    $query  = " SELECT songs.id, songs.title , songs.artiest, songs.price, songs.picture_location, songs.description, songs.file_location, album.title as 'album_title', genre.title as 'genre_title' ,library_songs.libraries_users_id
                FROM `songs`
                left join album
                on (songs.album_id=album.id)
                left join genre
                on(songs.genre_id=genre.id)
                left join library_songs
                on(songs.id=library_songs.songs_id)
                where library_songs.libraries_users_id={$_SESSION['gebruiker_informatie']['id']} and songs.title like '%$search%'
                ORDER by songs.title";

    $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));
      if ($result = $db->query($query))
    {
        /* fetch associative array */
        while ($row = $result->fetch_assoc())
        {

            echo "
            <tr>
            <td  class='body-item mbr-fonts-style display-7'><form action="."'".($_SERVER["PHP_SELF"])."'"."method='post'><button class='library-item' type='submit' name='song_own_button' value='{$row['id']}'> {$row['title'] }</button></form></td>
            <td class='body-item mbr-fonts-style display-7'>{$row['artiest']}</td>
            <td class='body-item mbr-fonts-style display-7'>{$row['album_title']}</td>
            <td class='body-item mbr-fonts-style display-7'>
            <button class='btn btn-sm btn-dark' x-link='{$row['file_location']}'>
            <i class='fa fa-play' aria-hidden='true'>
            </i>
            </button>
            </td>
            </tr>
           ";
        }

        /* free result set */
        $result->free();
    }
}
else
{
    $query  = " SELECT songs.id, songs.title , songs.artiest, songs.price, songs.picture_location, songs.description, songs.file_location, album.title as 'album_title', genre.title as 'genre_title' ,library_songs.libraries_users_id
                FROM `songs`
                left join album
                on (songs.album_id=album.id)
                left join genre
                on(songs.genre_id=genre.id)
                left join library_songs
                on(songs.id=library_songs.songs_id)
                where library_songs.libraries_users_id={$_SESSION['gebruiker_informatie']['id']}
                ORDER by songs.title";

    $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));

    if ($result = $db->query($query))
    {
        /* fetch associative array */
        while ($row = $result->fetch_assoc())
        {
            echo "

            <tr>
            <td class='body-item mbr-fonts-style display-7'><form action="."'".($_SERVER["PHP_SELF"])."'"."method='post'><button class='library-item' type='submit' name='song_own_button' value='{$row['id']}'> {$row['title'] }</button></form></td>
            <td class='body-item mbr-fonts-style display-7'>{$row['artiest']}</td>
            <td class='body-item mbr-fonts-style display-7'>{$row['album_title']}</td>
            <td class='body-item mbr-fonts-style display-7'>
            <button class='btn btn-sm btn-dark' x-link='{$row['file_location']}'>
            <i class='fa fa-play' aria-hidden='true'>
            </i>
            </button>
            </td>
            </tr>

            ";
        }

        /* free result set */
        $result->free();
    }
}
?>
