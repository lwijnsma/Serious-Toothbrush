
<?php
include 'cfg/connection.php';
include 'include/function.php';
//this deletes a record if the button is pushed
if (!empty($_POST['admin_edit_users_delete']))
{



/*hier moet heel wat opgeruimt worden
alle tables die zijn aangemaakt moeten hier worden verwijderd
dit betekend dat de volgende dingen moeten worden verwijdert:
-cart_songs
-cart
-libray_songs
-library

*/



//dit verwijdert de cart_songs van de user
$Delete_query_cart_songs="DELETE from cart_songs where cart_id ='".$_POST['admin_edit_users_delete']."'";
set_error_handler("custom_error_ErrorHandler_for_users_cart_songs");
mysqli_query($db, $Delete_query_cart_songs) or trigger_error('an in use error');


//dit verwijdert de cart van de user
$Delete_query_cart="DELETE from cart where users_id ='".$_POST['admin_edit_users_delete']."'";
set_error_handler("custom_error_ErrorHandler_for_users_cart");
mysqli_query($db, $Delete_query_cart) or trigger_error('an in use error');



//dit verwijdert de library_songs van de user
$Delete_query_library_songs="DELETE from library_songs where libraries_users_id ='".$_POST['admin_edit_users_delete']."'";
set_error_handler("custom_error_ErrorHandler_for_users_library_songs");
mysqli_query($db, $Delete_query_library_songs) or trigger_error('an in use error');


//dit verwijdert de library van de user
$Delete_query_library="DELETE from libraries where users_id ='".$_POST['admin_edit_users_delete']."'";
set_error_handler("custom_error_ErrorHandler_for_users_library");
mysqli_query($db, $Delete_query_library) or trigger_error('an in use error');


//dit verwijdert uiteindelijk de user
$Delete_query_user="DELETE from users where id ='".$_POST['admin_edit_users_delete']."'";
set_error_handler("custom_error_ErrorHandler_for_users");
mysqli_query($db, $Delete_query_user) or trigger_error('an in use error');


$_POST['profile']='accounts';
$_SESSION['profiles']='accounts';
}


//this fills the table
$query="SELECT * from users";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));

if ($result = $db->query($query))
{
    /* fetch associative array */
    while ($row = $result->fetch_assoc())
    {
      echo "<tr><td class='body-item mbr-fonts-style display-7'>{$row['username']}</td><td class='body-item mbr-fonts-style display-7'>{$row['first_name']}</td><td class='body-item mbr-fonts-style display-7'>{$row['last_name']}</td><td class='body-item mbr-fonts-style display-7'>{$row['email']}</td><td class='body-item mbr-fonts-style display-7'>{$row['is_admin']}</td><form  action='".htmlspecialchars(($_SERVER['PHP_SELF']))."' method='post'><td class='body-item mbr-fonts-style display-7'><button type='submit'class='library-item' name='profile_admin_edit_account' value='{$row['username']}'>edit</button></td><td class='body-item mbr-fonts-style display-7'><button type='submit'class='library-item' name='admin_edit_users_delete' value='".$row['id']."'>delete</button></td></form></tr>";
    }

    /* free result set */
    $result->free();
}


//junk
if(!empty($_POST['something']))
{
    $title=mysqli_real_escape_string('');
    $artist=mysqli_real_escape_string('');
    $year=date('y');


    $check1_query="SELECT title FROM songs where title='".$title."'";
    $check1_result=mysqli_query($db, $check1_query) or die("FOUT : " . mysqli_error($db));

}

 ?>
