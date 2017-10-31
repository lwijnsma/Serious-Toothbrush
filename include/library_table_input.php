<?php include 'cfg/connection.php';

if(!empty($_POST['library_search']))
{

$search=htmlspecialchars($_POST['library_search']);
$search=stripslashes ($search);
$search=trim($search);
$search = mysqli_real_escape_string($db, $search);

$query="SELECT * FROM songs
FULL JOIN library_songs
ON title = songs_title
WHERE libraries_users_id = {$_SESSION['gerbruiker_informatie']['id']}
ORDER BY songs_title";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));

if ($result = $db->query($query))

{

     /* fetch associative array */
     while ($row = $result->fetch_assoc()) {
          echo  '<td class="body-item mbr-fonts-style display-7">'.$row['title'] .'</td><td class="body-item mbr-fonts-style display-7">'. $row['artiest']  .'</td><td class="body-item mbr-fonts-style display-7">'. $row['album_title'] .'</td><td class="body-item mbr-fonts-style display-7"><button class="btn btn-sm btn-dark" type="submit" name="add"><i class="fa fa-play" aria-hidden="true"></i></button></td></tr><tr>';
     }

     /* free result set */
     $result->free();
}
}
else
{

$query="SELECT * FROM songs
FULL JOIN library_songs
ON title = songs_title
WHERE libraries_users_id = ".$_SESSION['gerbruiker_informatie']['id']."
ORDER BY songs_title";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));

if ($result = $db->query($query))

{

       /* fetch associative array */
       while ($row = $result->fetch_assoc()) {
            echo  '<td class="body-item mbr-fonts-style display-7">'.$row['title'] .'</td><td class="body-item mbr-fonts-style display-7">'. $row['artiest']  .'</td><td class="body-item mbr-fonts-style display-7">'. $row['album_title'] .'</td><td class="body-item mbr-fonts-style display-7"><button class="btn btn-sm btn-dark" type="submit" name="add"><i class="fa fa-play" aria-hidden="true"></i></button></td></tr><tr>';
       }

       /* free result set */
       $result->free();
}
}
 ?>
