<?php

if(!empty($_POST['store_add'])){

if(isset($_SESSION['auth'])){
$query="SELECT * FROM library_songs where songs_title ='".$_POST['store_add']."'and libraries_users_id = ".$_SESSION['gerbruiker_informatie']['id']."";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

if(mysqli_num_rows($result)==0)

{
$query="SELECT * from cart_songs where songs_title='".$_POST['store_add']."'and cart_id =".$_SESSION['gerbruiker_informatie']['id']."";

$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
if(mysqli_num_rows($result)==0)
{
$query="INSERT into cart_songs values('".$_POST['store_add']."',".$_SESSION['gerbruiker_informatie']['id'].")";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));
echo '<div class="alert alert-success" role="alert">song aan shoppingcart toegevoegd</div>';
}
else{echo'<br><div class="alert alert-warning" role="alert">dit nummer zit al in je shoppincart</div>';}
}
else{echo'<br><div class="alert alert-warning" role="alert">dit nummer zit al in je library</div>';}
}
else{
  $_POST['page']='Login';
  $_SESSION['pages']='Login';
  header('location:redirect.php');
} }?>
