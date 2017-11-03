<?php
include 'cfg/connection.php';
if (isset($_POST['add1'])){
$user       = mysqli_real_escape_string($db, $_POST['title']);
$email      = mysqli_real_escape_string($db, $_POST['description']);
var_dump($_POST['add1']);
}
else {
	echo 'hoi';
}
?>
