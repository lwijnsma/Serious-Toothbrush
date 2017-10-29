<?php

if(!empty($_POST['store_add'])){

if($_SESSION['auth']==true){
$query="SELECT * FROM library_songs where songs_title ='".$_POST['store_add']."'and libraries_users_id = ".$_SESSION['gerbruiker_informatie']['id']."";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

if(mysqli_num_rows($result)==0)

{
$query="SELECT * from cart_songs where songs_title='".$_POST['store_add']."'and cart_id =".$_SESSION['gerbruiker_informatie']['id']."";

$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
if(mysqli_num_rows($result)==0)
{
$query="INSERT into cart_songs values('".$_POST['store_add']."',".$_SESSION['gerbruiker_informatie']['id'].")";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
echo 'song aan shoppingcart toegevoegd';
}
else{echo'dit nummer zit al in je shoppincart';}
}
else{echo'dit nummer zit al in je library';}
}
else{
  $_POST['page']='Login';
  $_SESSION['pages']='Login';
  header('location:redirect.php');
} }?>
