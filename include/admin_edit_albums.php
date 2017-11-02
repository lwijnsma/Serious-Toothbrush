
<?php
include 'cfg/connection.php';


$query="SELECT * from album";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));

if ($result = $db->query($query))
{
    /* fetch associative array */
    while ($row = $result->fetch_assoc())
    {
      echo "<tr><td class='body-item mbr-fonts-style display-7'>{$row['title']}</td><td class='body-item mbr-fonts-style display-7'>{$row['artist']}</td><td class='body-item mbr-fonts-style display-7'>{$row['year']}</td><form  action='".($_SERVER['PHP_SELF'])."' method='post'><td class='body-item mbr-fonts-style display-7'><button type='submit'class='' name='admin_edit_albums_edit' value='edit'>edit</button></td><td class='body-item mbr-fonts-style display-7'><button type='submit'class='' name='admin_edit_albums_delete' value='".$row['title']."'>delete</button></td></form></tr>";
    }

    /* free result set */
    $result->free();
}
if (!empty($_POST['admin_edit_albums_delete']))
{
$Delete_query="DELETE from album where title ='".$_POST['admin_edit_albums_delete']."'";
mysqli_query($db, $Delete_query) or die("FOUT : " . mysqli_error($db));

$_POST['profile']='album';
$_SESSION['profiles']='album';
header('location:redirect.php');


}

if(!empty($_POST['something']))
{
    $title=mysqli_real_escape_string('');
    $artist=mysqli_real_escape_string('');
    $year=date('y');


    $check1_query="SELECT title FROM songs where title='".$title."'";
    $check1_result=mysqli_query($db, $check1_query) or die("FOUT : " . mysqli_error($db));



/*if (mysqli_num_rows($check1_result) == 0)
    {
            $query="INSERT INTO album(title,artist,year,created_at, updated_at)
            VALUES('$title','$artist','$year','".date('y-m-d')."','".date('y-m-d')."')";
            mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));



    }
    else
    {
            echo 'This song title already exist';
    }
    */
}

 ?>
