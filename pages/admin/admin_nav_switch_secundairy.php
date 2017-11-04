<?php
//hiermee wordt de edit geredirect
if (isset($_POST['profile_admin_edit_album'])) {
  $_SESSION['edit_button_value']=$_POST['profile_admin_edit_album'];
  $_POST['profile']= 'edit_album';
  header('location:redirect.php');
}

if (isset($_POST['profile_admin_edit_genre'])) {
  $_SESSION['edit_button_value']=$_POST['profile_admin_edit_genre'];
  $_POST['profile']= 'edit_genre';
  header('location:redirect.php');
}

if (isset($_POST['profile_admin_edit_account'])) {
  $_SESSION['edit_button_value']=$_POST['profile_admin_edit_account'];
  $_POST['profile']= 'edit_account';
  header('location:redirect.php');
}


 ?>
