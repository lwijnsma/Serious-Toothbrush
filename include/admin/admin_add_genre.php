<?php
//incude File
include 'cfg/connection.php';
include 'include/function.php';
////////////
if (isset($_POST['genre_add']))
{
  if(!empty($_POST['title']) && !empty($_POST['description']))
  {
    $title=mysqli_real_escape_string($db, $_POST['title']);
    $description=mysqli_real_escape_string($db, $_POST['description']);
    $insert_query="insert into genre(title,description,created_at,updated_at)
    values('".$title."','".$description."','".date('y-m-d')."','".date('y-m-d')."')";
    set_error_handler("custom_error_ErrorHandler_for_add_genre");
    $result=mysqli_query($db, $insert_query) or trigger_error('a custom error');

  //$result gives a bool so true on success
  if($result==1)
  echo '<div class="alert alert-success" role="alert">Het genre is toegevoegd</div>';

  }

  else
  {
      echo '<div class="alert alert-danger" role="alert">niet alle velden zijn ingevuld</div>';
  }
}





 ?>
