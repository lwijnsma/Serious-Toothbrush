<?php
if(!empty($_POST)){
switch ($_POST['submit']) {
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
