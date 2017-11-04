<?php
  include 'cfg/connection.php';
  include 'include/function.php';
//this deletes a record if the button is pushed
  if (!empty($_POST['admin_edit_genre_delete']))
  {
  $Delete_query="DELETE from genre where title ='".$_POST['admin_edit_genre_delete']."'";

  set_error_handler("custom_error_ErrorHandler_for_genre");
  mysqli_query($db, $Delete_query) or trigger_error('an in use error');


  $_POST['profile']='genre';
  $_SESSION['profiles']='genre';
  }

  //this fills the table
  $query="SELECT * from genre";
  $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));

  if ($result = $db->query($query))
  {
      /* fetch associative array */
      while ($row = $result->fetch_assoc())
      {
        echo "<tr><td class='body-item mbr-fonts-style display-7'>{$row['title']}</td><td class='body-item mbr-fonts-style display-7'>{$row['description']}</td><td class='body-item mbr-fonts-style display-7'>{$row['updated_at']}</td><form  action='".($_SERVER['PHP_SELF'])."' method='post'><td class='body-item mbr-fonts-style display-7'><button type='submit'class='library-item' name='profile_admin_edit_genre' value='{$row['title']}'>edit</button></td><td class='body-item mbr-fonts-style display-7'><button type='submit'class='library-item' name='admin_edit_genre_delete' value='".$row['title']."'>delete</button></td></form></tr>";
      }

      /* free result set */
      $result->free();
  }

 ?>
