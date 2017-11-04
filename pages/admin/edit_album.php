<div class="col">
         <h2 id="white" class="mbr-section-title mbr-fonts-style align-center pb-3 display-4">Edit ALbum</h2>
   </br>
   <div class="card">
      <div class="card-body">


<?php
//incude File
include 'cfg/connection.php';
include 'include/function.php';
////////////

if (isset($_SESSION['edit_button_value']))
{
    $title= $_SESSION['edit_button_value'];
}

$select_query="select * from album where title='".$title."'";
set_error_handler("custom_error_ErrorHandler_for_edit_album");
$select_result=mysqli_query($db, $select_query) or trigger_error('error_on_select');
$select_result=mysqli_fetch_assoc($select_result);

$artist=$select_result['artist'];
$year=$select_result['year'];

/*
if (isset($_POST['lolo']))
$changed_artist=mysqli_real_escape_string($db,$_POST['artist']);
$changed_year=mysqli_real_escape_string($db,$_POST['artist']);
$update_query="update album set artist='".$changed_arist."',year='".$changed_year."',updated_at='".date('y-m-d')."' where title='".$title."'";
mysqli_query($db, $update_query) or trigger_error('error_on_update');

*/
var_dump('album_change');
?>

         <form class="" role="form" action="<?php ($_SERVER['PHP_SELF']);?>" method="post">
            <div class="row">
                  <label for="">Album Title:</label><input type="text" disabled="true" class="form-control" name="titel" value="<?php echo $title; ?>" size="20" ><br>
            </div>
            <div class="row">
               <label for="">Artist:</label><input type="text" class="form-control" name="artist"
   rows="10" cols="50" value="<?php echo $artist; ?>">
               </div>
               <div class="row">
               <label for="">year:</label><input type="year"  class="form-control" name="year"
   rows="10" cols="50" value="<?php echo $year; ?>">
               </div><br>
               <div class="row">
                   <button class="btn btn-success" type="submit" name="album_change" value="album_change">Change</buttton>
                  	</div>
            </form>
      </div>
   </div>
</div>
<?php

 ?>
