<?php
//incude File
include 'cfg/connection.php';
include 'include/function.php';
////////////
if (isset($_POST['album_add']))
{
  if(!empty($_POST['title']) && !empty($_POST['artist']))
  {
    $title=mysqli_real_escape_string($db, $_POST['title']);
    $artist=mysqli_real_escape_string($db, $_POST['artist']);
    $insert_query="insert into album(title,artist,year,created_at,updated_at)
    values('".$title."','".$artist."','".date('y')."','".date('y-m-d')."','".date('y-m-d')."')";
    set_error_handler("custom_error_ErrorHandler_for_add_album");
    $result=mysqli_query($db, $insert_query) or trigger_error('a custom error');

  //$result gives a bool so true on success
  if($result==1)
  echo '<div class="alert alert-success" role="alert">Het album is toegevoegd</div>';

  }

  else
  {
      echo '<div class="alert alert-danger" role="alert">niet alle velden zijn ingevuld</div>';
  }
}





 ?>
