<?php


if (isset($_POST['page'])) {
$_SESSION["pages"]=$_POST['page'];
}

if(!empty($_SESSION["pages"])){

switch ($_SESSION["pages"]) {
  case 'Home':
    include './pages/home.php';
    break;


  case 'Home':
    include './pages/home.php';
      break;
  case 'Store':
  ///deze moet nog aangepast worden
    include './pages/store.php';

    break;
//////////////////////////
  case 'Library':
    if(isset($_SESSION["auth"]))
    {  include './pages/library.php';}
    else{
      include './pages/login.php';
}
break;

  case 'Register':
    include './pages/register.php';
    break;


  case 'Account':
    if(isset($_SESSION["auth"]))
    {  include './pages/profile.php';}
    else{
      //include './scripts voor login en register/login.php';
      include './pages/login.php';
    }
  break;
  
  case 'Cart':
    include './pages/Cart.php';
    break;


}

}
else {

  include './pages/home.php';
}












 ?>
