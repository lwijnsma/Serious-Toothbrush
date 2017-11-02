<?php
include 'cfg/connection.php';
if (isset($_POST['password_change']))
{

	$npassword = password_hash($_POST['npassword'],PASSWORD_DEFAULT);
	$npassword=htmlspecialchars($npassword);
	$npassword=stripslashes ($npassword);
	$npassword=trim($npassword);
	$npassword = mysqli_real_escape_string($db, $npassword);

	$user=htmlspecialchars($_SESSION["gerbruiker_informatie"]["username"]);
	$user=stripslashes ($user);
	$user=trim($user);
	$user = mysqli_real_escape_string($db, $user);

	$password=$_POST['password'];
    //hier wordt de hash opgehaalt
	$query =  "SELECT * FROM USERS
	WHERE BINARY username ='" .$user."'";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());


	if (mysqli_num_rows($result)==1)
	{
		$result=mysqli_fetch_assoc($result)or die("FOUT : " . mysqli_error());


      //hier wordt gekeken of het wachtwoord klopt
		$password = password_verify($password,$result['password']);
		if ($password==1)
		{

			if ($_POST['npassword']==$_POST['repassword']){
				$query= "update users set password='".$npassword."' where id='".$_SESSION["gerbruiker_informatie"]["id"]."'";
				mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

				$query = 	"SELECT * FROM USERS
				WHERE id ='".$_SESSION["gerbruiker_informatie"]["id"]."'";
				$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
				$result=mysqli_fetch_assoc($result)or die("FOUT : " . mysqli_error());
				$_SESSION["gerbruiker_informatie"]=$result;


			}

			else { 
				echo '<div class="alert alert-danger" role="alert">wachtwoord niet gelijk </div>';
				die(); }

			}

			else
			{
				echo '<div class="alert alert-danger" role="alert">wachtwoord niet correct</div>';
				die();
			}
		}
	}
	?>