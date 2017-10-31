<?php include 'cfg/connection.php';

if(!empty($_POST['song_item_button']))
{

$_SESSION['Song_own']=$_POST['song_item_button'];
$_POST['page']='Song_own';
$_SESSION['pages']='Song_own';
header('location:redirect.php');
}

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
      echo "<form action="."'".htmlspecialchars($_SERVER["PHP_SELF"])."'"."method='post'>";
          echo  '<td class="body-item mbr-fonts-style display-7"><button class="store-item" type="submit" name="song_item_button" value="'.$row['title'].'">' .$row['title'] .'</button></td><td class="body-item mbr-fonts-style display-7">'. $row['artiest']  .'</td><td class="body-item mbr-fonts-style display-7">'. $row['album_title'] .'</td><td class="body-item mbr-fonts-style display-7"><button class="btn btn-sm btn-dark" type="submit" name="add"><i class="fa fa-play" aria-hidden="true"></i></button></td></tr><tr>';
          echo "</form>";
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
        echo "<form action="."'".htmlspecialchars($_SERVER["PHP_SELF"])."'"."method='post'>";
            echo  '<td class="body-item mbr-fonts-style display-7"><button class="store-item" type="submit" name="song_item_button" value="'.$row['title'].'">' .$row['title'] .'</button></td><td class="body-item mbr-fonts-style display-7">'. $row['artiest']  .'</td><td class="body-item mbr-fonts-style display-7">'. $row['album_title'] .'</td><td class="body-item mbr-fonts-style display-7"><button class="btn btn-sm btn-dark" type="submit" name="add"><i class="fa fa-play" aria-hidden="true"></i></button></td></tr><tr>';
            echo "</form>";
       }

       /* free result set */
       $result->free();
}
}
 ?>
