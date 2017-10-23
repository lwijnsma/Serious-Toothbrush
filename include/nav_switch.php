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
    include './pages/library.php';
    break;


  case 'Account':
  include './pages/profile.php';
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
