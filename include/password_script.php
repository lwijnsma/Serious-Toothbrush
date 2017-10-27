<?php
include 'cfg/connection.php';
  if (isset($_POST['user']))
  {
           $ppassword = password_hash($_POST['ppassword'],PASSWORD_DEFAULT);
           $ppassword=htmlspecialchars($ppassword);
           $ppassword=stripslashes ($ppassword);
           $ppassword=trim($ppassword);
           $ppassword = mysqli_real_escape_string($db, $ppassword);

           $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
           $password=htmlspecialchars($password);
           $password=stripslashes ($password);
           $password=trim($password);
           $password = mysqli_real_escape_string($db, $password);
  
  $ppassword = password_verify($ppassword,$result['ppassword']); 
  if ($ppassword==1)
  {
  if ($_POST['password']==$_POST['repassword']){
$query= "update USERS set password='".$password."' where id='".$_SESSION["gerbruiker_informatie"]["id"]."'";
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
?>