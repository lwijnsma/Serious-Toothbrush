<?php


if (isset($_POST['page']))
{
    $_SESSION["pages"] = $_POST['page'];
}

if(!empty($_SESSION["pages"]))
{
    switch ($_SESSION["pages"])
    {
        case 'Home':
            include './pages/home.php';
            break;

        case 'Song':
            include './pages/Song.php';
            break;

        case 'Song_own':
            include './pages/Song_own.php';
            break;

        case 'Store':
            //TODO: deze moet nog aangepast worden
            include './pages/store.php';
            break;

        case 'Checkout':
            include './pages/checkout.php';
            break;

        case 'Library':
            isset($_SESSION['auth'])? include './pages/library.php' : include './pages/login.php';
            break;

        /*
            Nog een labda functie.
            (statement) ? true : false

            Dus als auth gezet is laadt library anders login.
        */

        case 'Register':
            include './pages/register.php';
            break;

        case 'Account':
            isset($_SESSION['auth'])? include './pages/profile.php' : include './pages/login.php';
            break;

        case 'Cart':
            isset($_SESSION['auth'])? include './pages/cart.php' : include './pages/login.php';
            break;

        case 'Login':
            include './pages/login.php';
            break;
    }
}
else
{
    include './pages/home.php';
}












 ?>
