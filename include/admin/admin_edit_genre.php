<?php
// moet nog een check of number in

//incude File
include 'cfg/connection.php';
include 'include/function.php';
////////////

if (isset($_SESSION['edit_button_value']))
{

    $id= $_SESSION['edit_button_value'];


$select_query="select * from genre where id='".$id."'";
set_error_handler("custom_error_ErrorHandler_for_edit");
$select_result=mysqli_query($db, $select_query) or trigger_error('error_on_select');
$select_result=mysqli_fetch_assoc($select_result);
$title=$select_result['title'];
$description=$select_result['description'];
}

if (isset($_POST['genre_change']))
{
  if(!empty($_POST['description']))
  {
    $changed_title=mysqli_real_escape_string($db,$_POST['title']);
    $changed_description=mysqli_real_escape_string($db,$_POST['description']);
    $update_query="update genre set title='$changed_title',description='$changed_description', updated_at='".date('y-m-d')."' where id='".$id."'";
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
