
<?php
include 'cfg/connection.php';
include 'include/function.php';
//this deletes a record if the button is pushed
if (!empty($_POST['admin_edit_songs_delete']))
{

//hier wordt de muziek file verwijdert
$query_select="SELECT file_location from songs where title ='".$_POST['admin_edit_songs_delete']."'";
//set_error_handler("custom_error_ErrorHandler_for_songs_location");
$location = mysqli_query($db, $query_select) or die("FOUT : " . mysqli_error($db)); //trigger_error('an in use error');
$location= mysqli_fetch_assoc($location);
var_dump($location['file_location']);

    if (file_exists($location['file_location'])) {
        unlink($location['file_location']);
        }
          //dit verwijdert de cart_songs van de user
  $Delete_query_cart_songs="DELETE from cart_songs where songs_title ='".$_POST['admin_edit_songs_delete']."'";
  set_error_handler("custom_error_ErrorHandler_for_users_cart_songs");
  mysqli_query($db, $Delete_query_cart_songs) or trigger_error('an in use error');

  //dit verwijdert de library_songs van de user
  $Delete_query_library_songs="DELETE from library_songs where songs_title ='".$_POST['admin_edit_songs_delete']."'";
  set_error_handler("custom_error_ErrorHandler_for_users_library_songs");
  mysqli_query($db, $Delete_query_library_songs) or trigger_error('an in use error');

  //dit verwijdert de song
  $Delete_query="DELETE from songs where title ='".$_POST['admin_edit_songs_delete']."'";
  set_error_handler("custom_error_ErrorHandler_for_songs");
  mysqli_query($db, $Delete_query) or trigger_error('an in use error');


$_POST['profile']='tracklist';
$_SESSION['profiles']='tracklist';
}


  //this fills the table
$query="SELECT * from songs";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));

if ($result = $db->query($query))
{
    /* fetch associative array */
    while ($row = $result->fetch_assoc())
    {
      echo "<tr><td class='body-item mbr-fonts-style display-7'>{$row['title']}</td><td class='body-item mbr-fonts-style display-7'>{$row['artiest']}</td><td class='body-item mbr-fonts-style display-7'>{$row['length']}</td><td class='body-item mbr-fonts-style display-7'>{$row['album_title']}</td><td class='body-item mbr-fonts-style display-7'>{$row['genre_title']}</td><td class='body-item mbr-fonts-style display-7'>{$row['price']}</td><form  action='".($_SERVER['PHP_SELF'])."' method='post'><td class='body-item mbr-fonts-style display-7'><button type='submit'class='library-item' name='admin_edit_songs_edit' value='edit'>edit</button></td><td class='body-item mbr-fonts-style display-7'><button type='submit'class='library-item' name='admin_edit_songs_delete' value='".$row['title']."'>delete</button></td></form></tr>";
    }

    /* free result set */
    $result->free();
}

//junk
if(!empty($_POST['something']))
{
    $title=mysqli_real_escape_string('');
    $artist=mysqli_real_escape_string('');
    $year=date('y');


    $check1_query="SELECT title FROM songs where title='".$title."'";
    $check1_result=mysqli_query($db, $check1_query) or die("FOUT : " . mysqli_error($db));

}

 ?>
