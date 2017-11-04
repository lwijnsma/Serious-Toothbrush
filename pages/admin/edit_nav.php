<?php
//hiermee wordt de edit geredirect
if (isset($_POST['profile_admin_edit_album'])) {
  $_SESSION['edit_button_value']=$_POST['profile_admin_edit_album'];
  $_POST['profile']= 'edit_album';
  header('location:redirect.php');
}

if (isset($_POST['profile_admin_edit_genre'])) {
  $_SESSION['edit_button_value']=$_POST['profile_admin_edit_album'];
  $_POST['profile']= 'edit_album';
  header('location:redirect.php');
}



 ?>
