<?php
include 'cfg/connection.php';
$Song=$_SESSION['Song_own'];
$query="SELECT * FROM SONGS WHERE TITLE = '".$Song."'";
$result=mysqli_query($db,$query);
$result=mysqli_fetch_assoc($result);

echo '<div class="row">';
echo  '<div class="col">';
echo  '</br>';
echo'<h5 class="mbr-section-title mbr-fonts-style align-center display-4">'.$result["title"].'&nbsp;<small>'.$result["album_title"].'</small></h5>';
echo  '</div>';
echo  '<div class="col-sm-3">';
echo  '</br> </br>';
echo  '<form class="form-inline" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
echo'<button type="submit"  name="page" value="Library" class="btn btn-primary btn-sm btn-block"><i class="fa fa-share" aria-hidden="true"></i> back to library</button>';
echo'</form>';
echo  '</div>';
echo'</div>';

echo'<div class="card">';

echo '<div class="row">';
echo '<div class="col">';
echo       ' <img src="'.$result["picture_location"].'" alt="">';
echo      '</div>';
echo      '<div class="col">';
echo      '<h3>Song Description</h3>';
echo        '<p>'.$result["description"].'</p>';
echo        '<h3>Song Details</h3>';
echo        '<ul>';
echo          '<li>'.$result["artiest"].'</li>';
echo          '<li>'.$result["album_title"].'</li>';
echo          '<li>'.$result["genre_title"].'</li>';
echo        '</ul>';
echo      '</div>';
echo    '</div>';
echo    '<div class="row">';
echo      '<div class="col-sm-6 ml-auto">';
echo      '</div>';
echo      '<div class="col-sm-4 mr-auto">';
echo        '<h4>Price <small><b>€ '.number_format($result["price"],2).'</b></small></h4>';
echo      '</div>';
echo "<form action="."'".htmlspecialchars($_SERVER["PHP_SELF"])."'"."method='post'>";
echo      '<div class="col mr-auto"><button type="input" name="store_add" value="'.$result["title"].'" class="btn btn-dark"><i class="fa fa-cart-plus" aria-hidden="true"></i></button></div>';
echo '</form>';

?>
