<?php
function custom_error_ErrorHandler_for_album($errno, $errstr, $errfile, $errline) {
    echo '<div class="alert alert-danger" role="alert">this album is still in use, please remove this album from all records before changing or removing it.</div>';
}



 ?>
