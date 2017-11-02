<?php include 'cfg/connection.php'; ?>
<div class="col">
  <legend><h2 id="white" class="display-4">Upload New File:</h2></legend>
   </br>
   <div class="card">
      <div class="card-body">
        <form action="<?php ($_SERVER["PHP_SELF"]);?>" method='POST' enctype="multipart/form-data">
        <fieldset>
<label>Upload audio:</label> <br><input class="" type="file" accept="audio/*" name="audio"> <br><br>
Title:  <input class="form-control" type="text" name="title">  <br>
Artist: <input class="form-control" type="text" name="artist">  <br>
<div class="form-group">
  <label> Price: € </label>
  <div class="form-row">
<div class="form-group col-sm-5"> <input class="form-control" type="number" name="price1" min="0"></div> <div class="form-group col-sm-3"> <input  class="form-control" type="number" name="price2" min="0" max="99"> </div>
</div></div>
<select class="form-control" name="album">
<option value="album">Album:</option>
<?php
$sql = mysqli_query($db, "SELECT title FROM album") ;
while ($row = $sql->fetch_assoc()){
echo "<option value='album'>" . $row['title'] . "</option>";
}
?>
</select>
<br>
<select class="form-control" name="genre">
<option value="genre">Genre:</option>
<?php
$sql = mysqli_query($db, "SELECT title FROM genre") ;
while ($row = $sql->fetch_assoc()){
echo "<option value='genre'>" . $row['title'] . "</option>";
}
?>
</select> <br>
<input class="btn btn-success" type="submit" name="upload" value="Upload">
</fieldset>
</form>
<?php
if (empty($_POST["artist"])){
} else {
$artist = $_POST["artist"];
$title = $_POST["title"];
$genre = $_POST["genre"];
$price = $_POST["price1"] . "." . $_POST["price2"];
$album = $_POST["album"] ;
$upload = pathinfo($_FILES["audio"]["name"]);
$tmpname = $_FILES["audio"]["tmp_name"] ;
$ext = $upload["extension"];
$newname = $artist . "_" . $title . "." . $ext ;
echo "<br/>" ;
$target = 'songs/' . $newname ;

if (file_exists($target)) {
    echo "<div class='alert alert-danger'>File already exists.</div>";
}
else {
    if (move_uploaded_file($_FILES["audio"]["tmp_name"] , $target)) {
        echo "<div class='alert alert-success'>The file ". $newname . " has been uploaded.</div>";
		#Register in database.
		# - mysqli_real_escape_string
			$artiste = mysqli_real_escape_string($db, $artist) ;
			$titlee  = mysqli_real_escape_string($db, $title)  ;
			$genree  = mysqli_real_escape_string($db, $genre)  ;
			$pricee  = mysqli_real_escape_string($db, $price)  ;
			$albume  = mysqli_real_escape_string($db, $album)  ;
			$location= mysqli_real_escape_string($db, $target) ;

		# - Injection
		$inject = "INSERT INTO `songs` (title, artiest, created_at, updated_at, album_title, genre_title, quality_name, price, file_location)
		VALUES ('$titlee', '$artiste' , '".date('Y-m-d')."' , '".date('Y-m-d')."' , '$albume' , '$genree' , 'default' , '$pricee' , '$location' )";
		mysqli_query($db, $inject) or die("FOUT : ."mysqli_error($db)) ;
    } else {
        echo "<div class='alert alert-danger'>Error occured, file not uploaded.</div>";
    }
};=

};

?>
</div></div></div>