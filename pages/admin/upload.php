<?php include 'cfg/connection.php';
include 'include/function.php';?>

<div class="col">
  <legend><h2 id="white" class="display-4">Upload New File:</h2></legend>
   </br>
   <div class="card">
      <div class="card-body">
        <form action="<?php ($_SERVER["PHP_SELF"]);?>" method='POST' enctype="multipart/form-data">
        <fieldset>




<label class="custom-file-upload">
  <input class="" type="file" accept=".mp3,.wav,.ogg,.flac" name="audio">
    Select Audio
</label>

<label class="custom-file-upload">
  <input class="" type="file" accept=".png,.jpg,.jpeg,.gif,.bmp" name="cover">
    Select Coverart
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


<textarea class="form-control" name="decription"
   rows="10" cols="50">Description</textarea><br>
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
#Check if Artist is filled in.
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

#Coverart doesn't need to be set, but if it is it will check if it's a valid file.
if (empty($_FILES["cover"]["name"])){
$stockimg = 'images/stock.png';
$cext = "png" ;
$cunlink = " " ;
$cnewname = $artist . "_" . $title . "." . $cext ;
$ctarget = 'images/album_covers/' . $cnewname ;
copy ($stockimg, $ctarget) ;
} else {
$coveru = pathinfo($_FILES["cover"]["name"]);
$cext = $coveru["extension"];
$cunlink = $_FILES["cover"]["tmp_name"];
$cnewname = $artist . "_" . $title . "." . $cext ;
$ctarget = 'images/album_covers/' . $cnewname ;
move_uploaded_file($cunlink, $ctarget);
} ;

#Check if Audio Input is correct.
if  ($ext != "mp3" &&
	 $ext != "wav" &&
	 $ext != "ogg" &&
	 $ext != "flac" )
{
echo "<div class='alert alert-danger'>".$_SESSION["gerbruiker_informatie"]['username']." tried to bypass the system again. Please select an MP3, WAV, OGG or FLAC file.</div>";
		unlink($_FILES["audio"]["tmp_name"]);
		unlink($ctarget);
}
else {
#Check if Cover Input is correct.
if  ($cext != "png" &&
	 $cext != "jpg" &&
	 $cext != "jpeg"&&
	 $cext != "gif" &&
	 $cext != "bmp"  )
{
echo "<div class='alert alert-danger'><b>".$_SESSION["gerbruiker_informatie"]['username']."</b> Stop trying to bypass the system! Please select a PNG, WAV, OGG or FLAC file.</div>";
		unlink($_FILES["cover"]["tmp_name"]);
		unlink($ctarget);
}
else {

#Check if the file exists
if (file_exists($target)) {
    echo "<div class='alert alert-danger'>File already exists.</div>";
}
else {
    if (move_uploaded_file($_FILES["audio"]["tmp_name"] , $target)) {
        echo "<div class='alert alert-success'>The file ". $newname . " has been uploaded. <br/> <img src='" . $ctarget ."' height='50' width='50'></div>";


		#Register in database.
		# - mysqli_real_escape_string
			$artiste = mysqli_real_escape_string($db, $artist) ;
			$titlee  = mysqli_real_escape_string($db, $title)  ;
			$genree  = mysqli_real_escape_string($db, $genre)  ;
			$pricee  = mysqli_real_escape_string($db, $price)  ;
			$descriptione = mysqli_real_escape_string($db, $description);
			$albume  = mysqli_real_escape_string($db, $album)  ;
			$location= mysqli_real_escape_string($db, $target) ;
			$clocation=mysqli_real_escape_string($db, $ctarget);

		# - Injection
		$inject = "INSERT INTO `songs` (title, artiest, description, created_at, updated_at, album_title, genre_title, quality_name, price, picture_location, file_location)
		VALUES ('$titlee', '$artiste' ,'$descriptione', '".date('Y-m-d')."' , '".date('Y-m-d')."' , '$albume' , '$genree' , 'default' , '$pricee' , '$clocation' , '$location' )";
		set_error_handler("custom_error_ErrorHandler_for_upload");
		mysqli_query($db, $inject) or trigger_error("$target|$ctarget");
    } else {
        echo "<div class='alert alert-danger'>Error occured, file not uploaded.</div>";
    }
};

};

};

};

?>

</div></div></div>
