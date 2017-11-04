
<?php
//dit vult de input velden
include 'cfg/connection.php';
include 'include/function.php';
$select_query= "SELECT * from users where username='".$_SESSION["edit_button_value"]."'";
set_error_handler("custom_error_ErrorHandler_for_edit");
$select_result=mysqli_query($db, $select_query) or trigger_error('error_on_select');
$select_result=mysqli_fetch_assoc($select_result);
$first_name=$select_result['first_name'];
$last_name=$select_result['last_name'];
$email=$select_result['email'];

 ?>


 <?php


 if(isset($_POST['profile_change']))
 {
 if (!empty($_POST['profile_name']) && !empty($_POST['profile_lastname'])) {

 	$first_name=htmlspecialchars($_POST['profile_name']);
 	$first_name=stripslashes ($first_name);
 	$first_name=trim($first_name);
 	$first_name = mysqli_real_escape_string($db, $first_name);

 	$last_name=htmlspecialchars($_POST['profile_lastname']);
 	$last_name=stripslashes ($last_name);
 	$last_name=trim($last_name);
 	$last_name = mysqli_real_escape_string($db, $last_name);

 	$email=htmlspecialchars($_POST['profile_email']);
 	$email=stripslashes ($email);
 	$email=trim($email);
 	$email = mysqli_real_escape_string($db, $email);

 	if(filter_var($email, FILTER_VALIDATE_EMAIL)){

 ///als we tijd hebben verificatie schrijven of er iets is verandert voordat we het updaten -the programmer-

 		$update_query= "update users set first_name='".$first_name."',last_name='".$last_name."',email='".$email."',updated_at='".date('y-m-d')."' where username='".$_SESSION["edit_button_value"]."'";
    set_error_handler("custom_error_ErrorHandler_for_edit");
    mysqli_query($db, $update_query) or trigger_error('error_on_update');
     $_POST['profile']='accounts';
     $_SESSION["profiles"]='accounts';
     header('location: redirect.php');


 		}

 	else
 	{
 		echo '<div class="alert alert-danger" role="alert">email is niet correct</div>';
 	}
 }
 else {
 	echo '<div class="alert alert-danger" role="alert">Velden mogen niet leeg zijn</div>';
 }
 }

 ?>
