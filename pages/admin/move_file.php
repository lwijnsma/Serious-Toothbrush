<?php include 'cfg/connection.php'; ?>
<?php
$artist = htmlspecialchars($_POST["artist"]);
$title = htmlspecialchars($_POST["title"]);
$upload = pathinfo($_FILES["file"]["name"]);
$ext = $upload["extension"];
$newname = $artist . "_" . $title . "." . $ext ; 


$target = '../songs/' . $newname ;
if (file_exists($target)) {
    echo "File already exists. <br/> <a href='index.php'>Ok.</a>";
}
else {
move_upload_file($_FILES['userFile']['tmp_name'], $target);

header 'location: index.php';  } ;
?>

