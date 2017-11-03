<?php include 'cfg/connection.php'; ?>
<div class="col">
  <legend><h2 id="white" class="display-4">Upload New File:</h2></legend>
   </br>
   <div class="card">
      <div class="card-body">
        <form action="<?php ($_SERVER["PHP_SELF"]);?>" method='POST' enctype="multipart/form-data">
        <fieldset>




<label>Upload audio:</label> <br>
<label class="custom-file-upload">
  <input class="" type="file" accept="audio/*" name="audio">
    Browse files
</label>
<br><br>

<style media="screen">
input[type="file"] {
    display: none;
}

.custom-file-upload {
    border: 1px solid rgb(40, 167, 69);
    color: white;
    background-color: rgb(40, 167, 69);
    border-radius: 4px;
    display: inline-block;
    padding: 6px 9px;
    cursor: pointer;}
</style>







Title:  <input class="form-control" type="text" name="title">  <br>
Artist: <input class="form-control" type="text" name="artist">  <br>






<textarea name="decription"
   rows="10" cols="50">Description</textarea>
<div class="form-group">
  <label> Price: € </label>
  <div class="form-row">
<div class="form-group col-sm-5"> <input class="form-control" type="number" name="price1" min="0"></div> <div class="form-group col-sm-3"> <input  class="form-control" type="number" name="price2" min="0" max="99"> </div>
</div></div>
<select class="form-control" name='album'>
<option value="">Album:</option>
<?php
$sql = mysqli_query($db, "SELECT title FROM album") ;
while ($row = $sql->fetch_assoc()){
$albumrow = $row['title'] ;
echo "<option value='" . $albumrow . "'> " . $albumrow . "</option>";
}
?>
</select>
<br>
<select class="form-control" name='genre'>
<option value="">Genre:</option>
<?php
$sql = mysqli_query($db, "SELECT title FROM genre") ;
while ($row = $sql->fetch_assoc()){
$genrerow = $row['title'] ;
echo "<option value='" . $genrerow . "'>" . $genrerow . "</option>";
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
$description = $_POST["decription"];
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
			$descriptione = mysqli_real_escape_string($db, $description);
			$albume  = mysqli_real_escape_string($db, $album)  ;
			$location= mysqli_real_escape_string($db, $target) ;
var_dump($albume);
		# - Injection
		$inject = "INSERT INTO `songs` (title, artiest, description, created_at, updated_at, album_title, genre_title, quality_name, price, file_location)
		VALUES ('$titlee', '$artiste' ,'$descriptione', '".date('Y-m-d')."' , '".date('Y-m-d')."' , '$albume' , '$genree' , 'default' , '$pricee' , '$location' )";
		mysqli_query($db, $inject) or die (mysqli_error($db));
    } else {
        echo "<div class='alert alert-danger'>Error occured, file not uploaded.</div>";
    }
};

};

?>

</div></div></div>
