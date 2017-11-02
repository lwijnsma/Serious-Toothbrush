
<?php
include 'cfg/connection.php';


$query="SELECT * from users";
$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));

if ($result = $db->query($query))
{
    /* fetch associative array */
    while ($row = $result->fetch_assoc())
    {
      echo "<tr><td class='body-item mbr-fonts-style display-7'>{$row['username']}</td><td class='body-item mbr-fonts-style display-7'>{$row['first_name']}</td><td class='body-item mbr-fonts-style display-7'>{$row['last_name']}</td><td class='body-item mbr-fonts-style display-7'>{$row['email']}</td><td class='body-item mbr-fonts-style display-7'>{$row['is_admin']}</td><form  action='".($_SERVER['PHP_SELF'])."' method='post'><td class='body-item mbr-fonts-style display-7'><button type='submit'class='' name='admin_edit_users_edit' value='edit'>edit</button></td><td class='body-item mbr-fonts-style display-7'><button type='submit'class='' name='admin_edit_users_delete' value='".$row['username']."'>delete</button></td></form></tr>";
    }

    /* free result set */
    $result->free();
}
if (!empty($_POST['admin_edit_users_delete']))
{
$Delete_query="DELETE from users where username ='".$_POST['admin_edit_users_delete']."'";
mysqli_query($db, $Delete_query) or die("FOUT : " . mysqli_error($db));

$_POST['profile']='accounts';
$_SESSION['profiles']='accounts';
header('location:redirect.php');

}

 ?>
