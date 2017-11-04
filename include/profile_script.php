<?php
include 'cfg/connection.php';
if (!empty($_SESSION['edit_profile_succes']) && $_SESSION['edit_profile_succes']==1) {
	echo '<div class="alert alert-success" role="alert">gegevens gewijzigd</div>';
$_SESSION['edit_profile_succes']=0;
}
if(isset($_POST['profile_change']))
{
if (!empty($_POST['profile_name']) && !empty($_POST['profile_lastname'])) {
	# code...



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

		$query= "update USERS set first_name='".$first_name."',last_name='".$last_name."',email='".$email."',updated_at='".date('y-m-d')."' where username='".$_SESSION["gerbruiker_informatie"]["username"]."'";
		mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));


		$query = 	"SELECT * FROM USERS
		WHERE username ='".$_SESSION["gebruiker_informatie"]["username"]."'";
		$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
		$result=mysqli_fetch_assoc($result)or die("FOUT : " . mysqli_error());
		$_SESSION["gebruiker_informatie"]=$result;
		$_SESSION['edit_profile_succes']=1;
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
