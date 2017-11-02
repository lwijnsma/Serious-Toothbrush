<?php include 'cfg/connection.php'; ?>
<div class="col">
  <legend><h2 id="white" class="display-4">Upload New File:</h2></legend>
   </br>
   <div class="card">
      <div class="card-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST' enctype="multipart/form-data">
        <fieldset>
<label>Upload audio:</label> <br><input class="" type="file" accept="audio/*" name="audio"> <br><br>
Title:  <input class="form-control" type="text" name="title">  <br>
Artist: <input class="form-control" type="text" name="artist">  <br>
<div class="form-group">
  <label> Price: € </label>
  <div class="form-row">
<div class="form-group col-sm-5"> <input class="form-control" type="number" name="price1" min="0"></div> <div class="form-group col-sm-3"> <input  class="form-control" type="number" name="price2" min="0" max="99"> </div>
</div></div>
<select class="form-control name="genre">
<option value="">Album:</option>
<?php
$sql = mysqli_query($db, "SELECT title FROM album") ;
while ($row = $sql->fetch_assoc()){
echo "<option value=\"album\">" . $row['title'] . "</option>";
}
?>
</select>
<br>
<select class="form-control name="genre">
<option value="">Genre:</option>
<?php
$sql = mysqli_query($db, "SELECT title FROM genre") ;
while ($row = $sql->fetch_assoc()){
echo "<option value=\"genre\">" . $row['title'] . "</option>";
}
?>
</select> <br>
<input class="btn btn-success" type="submit" name="upload" value="Upload">
</fieldset>
</form>
</div></div></div>

<?php
if (empty($_POST["artist"])){
} else {
$artist = htmlspecialchars($_POST["artist"]);
$title = htmlspecialchars($_POST["title"]);
$genre = htmlspecialchars($_POST["genre"]);
$price = $_POST["price1"] . "." . $_POST["price2"];
$album = $_POST["album"] ;
$upload = pathinfo($_FILES["audio"]["name"]);
$tmpname = $_FILES["audio"]["tmp_name"] ;
$ext = $upload["extension"];
$newname = $artist . "_" . $title . "." . $ext ;
echo "<br/>" ;
$target = 'songs/' . $newname ;

if (file_exists($target)) {
    echo "File already exists.";
}
else {
    if (move_uploaded_file($_FILES["audio"]["tmp_name"] , $target)) {
        echo "The file ". $newname . " has been uploaded.";
		#Register in database.
		# - mysqli_real_escape_string
			$artiste = mysqli_real_escape_string($db, $artist) ;
			$titlee  = mysqli_real_escape_string($db, $title)  ;
			$genree  = mysqli_real_escape_string($db, $genre)  ;
			$pricee  = mysqli_real_escape_string($db, $price)  ;
			$albume  = mysqli_real_escape_string($db, $album)  ;
			$exte    = mysqli_real_escape_string($db, $ext)    ;
			$location= mysqli_real_escape_string($db, $target) ;

		# - Injection
		$inject = "INSERT INTO `songs` (TITLE, ARTIEST, CREATED_AT, UPDATED_AT, ALBUM_TITLE, GENRE_TITLE, QUALITY_NAME, PRICE, FILE_LOCATION)
		VALUES ('$titlee', '$artiste' , '".date('Y-m-d')."' , '".date('Y-m-d')."' , '$albume' , '$genree' , '$exte' , '$pricee' , '$location' )";
		mysqli_query($db, $inject) ;
    } else {
        echo "Error occured, file not uploaded.";
    }
};

};

?>
