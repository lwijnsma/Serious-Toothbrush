<?php
// moet nog een check of number in

//incude File
include 'cfg/connection.php';
include 'include/function.php';
////////////

if (isset($_SESSION['edit_button_value']))
{

    $title= $_SESSION['edit_button_value'];


$select_query="select * from genre where title='".$title."'";
set_error_handler("custom_error_ErrorHandler_for_edit");
$select_result=mysqli_query($db, $select_query) or trigger_error('error_on_select');
$select_result=mysqli_fetch_assoc($select_result);
$description=$select_result['description'];
}

if (isset($_POST['genre_change']))
{
  if(!empty($_POST['description']))
  {
    $changed_description=mysqli_real_escape_string($db,$_POST['description']);
   $update_query="update genre set description='".$changed_description."', updated_at='".date('y-m-d')."' where title='".$title."'";
    mysqli_query($db, $update_query) or trigger_error('error_on_update');
    $_POST['profile']='genre';
    $_SESSION['profiles']='genre';
    header('location:redirect.php');
  }
    else
  {
      echo '<div class="alert alert-danger" role="alert">niet alle velden zijn ingevuld</div>';
  }
}
?>
