<?php include 'cfg/connection.php';


if(!empty($_POST['store_add']))

{
if($_SESSION['auth']==true){
$query="SELECT * FROM library_songs where songs_title ='".$_POST['store_add']."'and libraries_users_id = ".$_SESSION['gerbruiker_informatie']['id']."";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

if(mysqli_num_rows($result)==0)

{
$query="SELECT * from cart_songs where songs_title='".$_POST['store_add']."'and cart_id =".$_SESSION['gerbruiker_informatie']['id']."";
var_dump($_POST['store_add']);
var_dump($_SESSION['gerbruiker_informatie']['id']);
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
if(mysqli_num_rows($result)==0)
{
$query="INSERT into cart_songs values('".$_POST['store_add']."',".$_SESSION['gerbruiker_informatie']['id'].")";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
echo 'song aa shoppingcart toegevoegd';
}
else{echo'dit nummer zit al in je shoppincart';}
}
else{echo'dit nummer zit al in je library';}
}
else{
  $_POST['page']='Login';
  $_SESSION['pages']='Login';
  header('location:redirect.php');
}
}

if(!empty($_POST['song_item_button']))
{
$_SESSION['Song']=$_POST['song_item_button'];
$_POST['page']='Song';
$_SESSION['pages']='Song';
header('location:redirect.php');

}






















if(!empty($_POST['store_search']))
{

$search=htmlspecialchars($_POST['store_search']);
$search=stripslashes ($search);
$search=trim($search);
$search = mysqli_real_escape_string($db, $search);

$query="SELECT  title, artiest, album_title, price  FROM `songs` WHERE title LIKE '%".$search."%' or album_title LIKE '%".$search."%' or artiest LIKE '%".$search."%'
ORDER BY title";
 $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

 if ($result = $db->query($query)) {

     /* fetch associative array */
     while ($row = $result->fetch_assoc()) {
       echo "<form action="."'".htmlspecialchars($_SERVER["PHP_SELF"])."'"."method='post'>";
          echo  '<td class="body-item mbr-fonts-style display-7"><button class="store-item" type="submit" name="song_item_button" value="'.$row['title'].'">' .$row['title'] .'</button></td><td class="body-item mbr-fonts-style display-7">'. $row['artiest']  .'</td><td class="body-item mbr-fonts-style display-7">'. $row['album_title'] .'</td><td class="body-item mbr-fonts-style display-7">'."€ ". $row['price'] .'</td><td class="body-item mbr-fonts-style display-7"><button class="btn btn-sm btn-dark" type="submit" name="store_add" value="'.$row['title'].'"><i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i></button></td></tr><tr>';
      echo "</form>";
     }

     /* free result set */
     $result->free();
}
}
else
{

  $query="SELECT * FROM `songs` WHERE title LIKE '%%'
  ORDER BY title";
   $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

   if ($result = $db->query($query)) {

       /* fetch associative array */
       while ($row = $result->fetch_assoc()) {
         echo"<form action="."'".htmlspecialchars($_SERVER["PHP_SELF"])."'"."method='post'>";
            echo  '<td class="body-item mbr-fonts-style display-7"><button class="store-item" type="submit" name="song_item_button" value="'.$row['title'].'">' .$row['title'] .'</button></td><td class="body-item mbr-fonts-style display-7">'. $row['artiest']  .'</td><td class="body-item mbr-fonts-style display-7">'. $row['album_title'] .'</td><td class="body-item mbr-fonts-style display-7"> '."€ ". $row['price'] .'</td><td class="body-item mbr-fonts-style display-7"><button class="btn btn-sm btn-dark" type="submit" name="store_add" value="'.$row['title'].'" ><i class="fa fa-cart-plus fa-2x" aria-hidden="true" ></i></button></td></tr><tr>';
            echo "</form>";
       }

       /* free result set */
       $result->free();


}


}



 ?>
