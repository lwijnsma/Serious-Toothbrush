<?php
if (isset($_POST['profile'])) {
$_SESSION["profiles"]=$_POST['profile'];
}

if(!empty($_SESSION["profiles"])){

switch ($_SESSION["profiles"]) {
  case 'upload':
    include 'upload.php';
    break;

  case 'accounts':
    include 'accounts.php';
      break;
	  
  case 'tracklist':
    include 'edit_tracklist.php';
      break;

  case 'Edit':
    include 'edit.php';
    break;

  case 'Password':
    include 'edit_password.php';
      break;
}

}
else {
  include 'edit_tracklist.php';
}

 ?>
