<?php include 'cfg/connection.php';



if(!empty($_POST['store_search']))
{

$search=htmlspecialchars($_POST['store_search']);
$search=stripslashes ($search);
$search=trim($search);
$search = mysqli_real_escape_string($db, $search);

$query="SELECT * FROM `songs` WHERE title LIKE '%".$search."%' or album_title LIKE '%".$search."%' or artiest LIKE '%".$search."%'
ORDER BY title";
 $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

 if ($result = $db->query($query)) {

     /* fetch associative array */
     while ($row = $result->fetch_assoc()) {
          echo  '<td class="body-item mbr-fonts-style display-7">'.$row['title'] .'</td><td class="body-item mbr-fonts-style display-7">'. $row['artiest']  .'</td><td class="body-item mbr-fonts-style display-7">'. $row['album_title'] .'</td><td class="body-item mbr-fonts-style display-7">'."€ ". $row['price'] .'</td></tr><tr>';
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
            echo  '<td class="body-item mbr-fonts-style display-7">'.$row['title'] .'</td><td class="body-item mbr-fonts-style display-7">'. $row['artiest']  .'</td><td class="body-item mbr-fonts-style display-7">'. $row['album_title'] .'</td><td class="body-item mbr-fonts-style display-7"> '."€ ". $row['price'] .'</td></tr><tr>';
       }

       /* free result set */
       $result->free();


}






}
 ?>
