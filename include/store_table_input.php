<?php include 'cfg/connection.php';



include 'include/cart_data_functions.php';


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
