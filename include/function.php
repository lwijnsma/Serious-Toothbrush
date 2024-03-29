<?php
function custom_error_ErrorHandler_for_album($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">this album is still in use, please remove this album from all records before changing or removing it.</div>';
}

function custom_error_ErrorHandler_for_genre($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">this genre is still in use, please remove this genre from all records before changing or removing it.</div>';
}


function custom_error_ErrorHandler_for_songs($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">something went wrong trying to delete the song record</div>';
}


function custom_error_ErrorHandler_for_songs_location($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">something went wrong trying to get the songs location</div>';
}


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


function custom_error_ErrorHandler_for_upload($errno, $errstr, $errfile, $errline)
{
$error_array=explode("|",$errstr);

foreach ($error_array as $value) {

    echo '<div class="alert alert-danger" role="alert">something went wrong trying to insert this record the uploaded record has been removed</div>';
    if (file_exists($value)){

          unlink($value);
    }
    else
    {
        echo '<div class="alert alert-danger" role="alert">something went wrong trying to delete the uploaded file, pls delete this file manualy, <b>file location:</b>'.$value.'</div>';
    }
}

}

function custom_error_ErrorHandler_for_add_album($errno, $errstr, $errfile, $errline){
    echo '<div class="alert alert-danger" role="alert">something went wrong trying to create this record, ';
    if($errno==1024) echo "the album already exists";
    else echo'please try again.';
    echo '</div>';
}

function custom_error_ErrorHandler_for_add_genre($errno, $errstr, $errfile, $errline){
    echo '<div class="alert alert-danger" role="alert">something went wrong trying to create this record, ';
    if($errno==1024) echo "the genre already exists";
    else echo'please try again.';
    echo '</div>';
}


function custom_error_ErrorHandler_for_edit($errno, $errstr, $errfile, $errline){
  if($errstr=='error_on_select') echo '<div class="alert alert-danger" role="alert">something went wrong trying to select the data from the database';
  if($errstr=='error_on_update') echo '<div class="alert alert-danger" role="alert">something went wrong trying to update the data in the database</div>';

}







 ?>
