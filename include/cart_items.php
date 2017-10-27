<?php
include 'cfg/connection.php';
$query="SELECT * FROM songs
LEFT JOIN cart_songs
ON songs.title = cart_songs.songs_title
WHERE cart_songs.cart_id = ".$_SESSION['gerbruiker_informatie']['id']."
ORDER BY songs_title";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());


if ($result = $db->query($query))

{

$total=0;
while ($row = $result->fetch_assoc())
{
  $title=$row['songs_title'];
  $picture= $row['picture_location'];
  $album=$row['album_title'];
  $price= number_format($row['price'],2);
  $total=$total+$price;
  echo '<div class="row">';
  echo '<div class="col"><img class="img-responsive" height="70px" width=100px src="'. $picture .'">';
  echo '</div>';
  echo '<div class="col">';
  echo '<h4 class="product-name"><strong>'.$title.'</strong></h4><h4><small>'.  $album .'</small></h4>';
  echo '</div>';
  echo '<div class="col">';
  echo '<div class="col text-right">';
  echo '<h6><strong>'."€ ".$price.'</strong></h6>';
  echo '</div>';
  echo '<div class="col text-right">';

  echo '';
  echo '<button type="submit" name="cart_remove" class="btn btn-sm btn-dark">';
  echo '<i class="fa fa-trash fa-2x" aria-hidden="true"></i>';
  echo '</button>';
  echo '</form>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '';

}
    /* free result set */
    $result->free();
}




 ?>
