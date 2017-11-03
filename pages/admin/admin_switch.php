<?php
if (isset($_POST['profile'])) {
  $_SESSION["profiles"]=$_POST['profile'];
}

if(!empty($_SESSION["profiles"])){

  switch ($_SESSION["profiles"]) {
    case 'add_song':
    include 'upload.php';
    break;

    case 'edit_song':
    include 'edit_song.php';
    break;

    case 'accounts':
    include 'accounts.php';
    break;

    case 'genre':
    include 'genre.php';
    break;

    case 'album':
    include 'album.php';
    break;

    case 'add_album':
    include 'add_album.php';
    break;

    case 'edit_album':
    include 'edit_album.php';
    break;

    case 'add_genre':
    include 'add_genre.php';
    break;

    case 'edit_genre':
    include 'edit_genre.php';
    break;

    case 'tracklist':
    include 'tracklist.php';
    break;

    case 'Edit':
    include 'edit.php';
    break;

    case 'Password':
    include 'edit_password.php';
    break;
  }

}
else{
  include 'edit.php';
}

?>
