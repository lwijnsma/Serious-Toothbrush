<?php if(!empty($_POST['song_own_button']))
{
    $_SESSION['Song_own']   = $_POST['song_own_button'];
    $_POST['page']          = 'Song_own';
    $_SESSION['pages']      = 'Song_own';
    header('location:redirect.php');
} ?>
