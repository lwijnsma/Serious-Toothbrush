<?php
include 'cfg/connection.php';
$song=$_SESSION['Song_own'];
$query="SELECT songs.id, songs.title , songs.artiest, songs.price, songs.picture_location, songs.description, songs.file_location, album.title as 'album_title', genre.title as 'genre_title' FROM `songs`
left join album on (songs.album_id=album.id)
left join genre on(songs.genre_id=genre.id)
where songs.id=$song";
$result=mysqli_query($db,$query);
$result=mysqli_fetch_assoc($result);

echo "
<div class='row'>
<div class='col'>
</br>
<h5 id='white' class='display-1' style='font-size:50px;'> ".$result["title"]." <br><small style='font-size:20px;'>".$result["album_title"]."</small></h5>
</div>
</br></br>
<form class='form-inline' action='".($_SERVER["PHP_SELF"])."' method='post'>
<button type='submit'  name='page' value='Library'class='btn btn-primary btn-sm btn-block'><i class='fa fa-share' aria-hidden='true'></i> back to library</button>
</form>
</div>
";

echo "<div class='card'>

 <div class='row'>
 <div class='col'>
        <br><img src='".$result['picture_location']."' alt=''>
      </div>
      <div class='col'>
      <br><h3>Song Description</h3>
        <p>".$result['description']."</p>
        <h3>Song Details</h3>
        <ul>
          <li>".$result['artiest']."</li>
          <li>".$result['album_title']."</li>
          <li>".$result['genre_title']."</li>
        </ul>
      </div>
    </div>
    <div class='row'>
      <div class='col-sm-6 ml-auto'>
      </div>
      </div>
 ";


?>
