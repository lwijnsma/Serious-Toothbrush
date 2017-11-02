<?php
include 'cfg/connection.php';
if(!empty($_POST['something']))
{
$title=mysqli_real_escape_string('');
$description=mysqli_real_escape_string('');


$check1_query="SELECT title FROM songs where title='".$title."'";
$check1_result=mysqli_query($db, $check1_query) or die("FOUT : " . mysqli_error($db));


if (mysqli_num_rows($check1_result) == 0) {
  $query="INSERT INTO Genre (title,description,created_at,updated_at)
  VALUES('$title','$description',".date('Y-m-d')."','".date('Y-m-d')."')";
  mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));




}
else {
  echo 'This genre already exist';
}
}

 ?>
