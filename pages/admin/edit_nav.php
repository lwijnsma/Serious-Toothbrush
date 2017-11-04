<?php
//hiermee wordt de edit geredirect
if (isset($_POST['profile_admin_edit'])) {
  $_SESSION['edit_button_value']=$_POST['profile_admin_edit'];
  $_POST['profile']= 'edit_album';
  header('location:redirect.php');
}



 ?>
