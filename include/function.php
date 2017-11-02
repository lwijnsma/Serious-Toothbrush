<?php
function custom_error_ErrorHandler_for_album($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">this album is still in use, please remove this album from all records before changing or removing it.</div>';
}

function custom_error_ErrorHandler_for_genre($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">this genre is still in use, please remove this genre from all records before changing or removing it.</div>';
}

function custom_error_ErrorHandler_for_songs($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">this song is still in use, please remove this song from all  other records before changing or removing it.</div>';
}

 ?>
