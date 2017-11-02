<?php include 'cfg/connection.php'; ?>
<head>
<title>ADMIN PAGE HOLY FUCK</title>
</head>
<body bgcolor="#FFEFF">
<font color="white">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='POST' enctype="multipart/form-data"> 
<fieldset>
<legend><h2>Upload New File:</h2></legend>
Upload audio: <input type="file" accept="audio/*" name="audio"> <br>
Artist: <input type="text" name="artist">  <br>
Title:  <input type="text" name="title">  <br>
Price: € <input type="number" name="price1" min="0"> , <input type="number" name="price2" min="0" max="99">  <br>
Length: <input type="text" name="length"> <br>
<?php #Genres ?> 
<select name="genre">
<option value="">Genre:</option>
<option value="elect">Electronic / EDM</option>
<option value="rock">Rock / Metal</option>
<option value="soul">Soul / RnB</option>
<option value="jazz">Jazz / Swing</option>
</select> <br>
<input type="submit" name="upload" value="Upload">
</fieldset>
</form>

<?php
if (empty($_POST["artist"])){
} else {
$artist = htmlspecialchars($_POST["artist"]);
$title = htmlspecialchars($_POST["title"]);
$genre = htmlspecialchars($_POST["genre"]);
$price = $_POST["price1"] . "." . $_POST["price2"];
$length = $_POST["length"] ; 
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
		$sql = "INSERT INTO songs (title, artiest, genre_title, quality_name, file_location)
		VALUES ($title , $artist, $genre, $ext, $target)";
    } else {
        echo "Error occured, file not uploaded.";
    }
};

};

?>
</font>
</body>