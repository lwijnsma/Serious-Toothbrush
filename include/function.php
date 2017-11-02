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

//hier begint de  custom error handler van voor de account page
function custom_error_ErrorHandler_for_users_cart_songs($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">something went wrong trying to delete the songs from the shoppingcart</div>';
}


function custom_error_ErrorHandler_for_users_cart($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">something went wrong trying to delete the shoppingcart</div>';
}


function custom_error_ErrorHandler_for_users_library_songs($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">something went wrong trying to delete the songs in the library</div>';
}


function custom_error_ErrorHandler_for_users_library($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">something went wrong trying to delete the library</div>';
}


function custom_error_ErrorHandler_for_users($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">something went wrong trying to delete the user record</div>';
}

 ?>
