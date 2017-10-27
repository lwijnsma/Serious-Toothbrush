
<?php

$query =   "SELECT ID FROM USERS

WHERE BINARY username ='" . $user ."'";


$result_setup=mysqli_query($db, $query) or die("FOUT : " . mysqli_error());
$result_setup=mysqli_fetch_assoc($result_setup);
$query= "INSERT INTO CART(CREATED_AT,UPDATED_AT,USERS_ID)
VALUES('".date('Y-m-d')."','".date('Y-m-d')."',".$result_setup['ID'].")";
mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

$query= "INSERT INTO LIBRARIES(TITLE,DESCRIPTION,CREATED_AT,UPDATED_AT,USERS_ID)
VALUES('MAIN LIBRARY','its a library','".date('Y-m-d')."','".date('Y-m-d')."',".$result_setup['ID'].")";
mysqli_query($db, $query) or die("FOUT : " . mysqli_error());




 ?>
