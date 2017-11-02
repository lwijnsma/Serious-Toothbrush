
<?php
include 'cfg/connection.php';


$query="SELECT * from genre";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));

if ($result = $db->query($query))
{
    /* fetch associative array */
    while ($row = $result->fetch_assoc())
    {
      echo "<tr><td class='body-item mbr-fonts-style display-7'>{$row['title']}</td><td class='body-item mbr-fonts-style display-7'>{$row['description']}</td><form  action='".($_SERVER['PHP_SELF'])."' method='post'><td class='body-item mbr-fonts-style display-7'><button type='submit'class='' name='admin_edit_genre_edit' value='edit'>edit</button></td><td class='body-item mbr-fonts-style display-7'><button type='submit'class='' name='admin_edit_genre_delete' value='".$row['title']."'>delete</button></td></form></tr>";
    }

    /* free result set */
    $result->free();
}
if (!empty($_POST['admin_edit_genre_delete']))
{
$Delete_query="DELETE from genre where title ='".$_POST['admin_edit_genre_delete']."'";
mysqli_query($db, $Delete_query) or die("FOUT : " . mysqli_error($db));

$_POST['profile']='tracklist';
$_SESSION['profiles']='tracklist';
header('location:redirect.php');

}


 ?>
