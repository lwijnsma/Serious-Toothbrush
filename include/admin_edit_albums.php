

<?php
include 'cfg/connection.php';
if(!empty($_POST['something']))
{
    $title=mysqli_real_escape_string('');
    $artist=mysqli_real_escape_string('');
    $year=date('y');


    $check1_query="SELECT title FROM songs where title='".$title."'";
    $check1_result=mysqli_query($db, $check1_query) or die("FOUT : " . mysqli_error($db));



    if (mysqli_num_rows($check1_result) == 0)
    {
            $query="INSERT INTO album(title,artist,year,created_at, updated_at)
            VALUES('$title','$artist','$year','".date('y-m-d')."','".date('y-m-d')."')";
            mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));



    }
    else
    {
            echo 'This song title already exist';
    }
}

 ?>
