

<?php
// moet nog een check of number in

//incude File
include 'cfg/connection.php';
include 'include/function.php';
////////////

if (isset($_SESSION['edit_button_value']))
{

    $title= $_SESSION['edit_button_value'];


$select_query="select * from album where title='".$title."'";
set_error_handler("custom_error_ErrorHandler_for_edit_album");
$select_result=mysqli_query($db, $select_query) or trigger_error('error_on_select');
$select_result=mysqli_fetch_assoc($select_result);

$artist=$select_result['artist'];
$year=$select_result['year'];
}

if (isset($_POST['album_change']))
{
  if(!empty($_POST['artist']) && !empty($_POST['year']))
  {
    $changed_artist=mysqli_real_escape_string($db,$_POST['artist']);
    var_dump($changed_artist);
    $changed_year=mysqli_real_escape_string($db,$_POST['year']);
    var_dump($changed_year);
    $update_query="update album set artist='".$changed_artist."', year='".$changed_year."', updated_at='".date('y-m-d')."' where title='".$title."'";
    mysqli_query($db, $update_query) or trigger_error('error_on_update');
    $_POST['profile']='album';
    $_SESSION['profiles']='album';
    header('location:redirect.php');
  }
    else
  {
      echo '<div class="alert alert-danger" role="alert">niet alle velden zijn ingevuld</div>';
  }
}
?>
