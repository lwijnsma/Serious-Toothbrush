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
        include './pages/song.php';
        break;

        case 'Song_own':
        include './pages/song_own.php';
        break;

        case 'Store':
            //TODO: deze moet nog aangepast worden
        include './pages/store.php';
        break;

        case 'Checkout':
        include 'cfg/connection.php';
        $query  =   "SELECT * FROM `cart_songs`  where cart_id =".$_SESSION["gerbruiker_informatie"]["id"]."";
            //dit kijkt of songs in de cart staan
        $result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error($db));
        if (mysqli_num_rows($result) != 0){include './pages/checkout.php';}
        else{
          $_POST['page']="Cart";
          $_SESSION['pages']="Cart";
          header('location:redirect.php');
        }
        break;

        case 'Library':
        isset($_SESSION['auth'])? include './pages/library.php' : include './pages/login.php';
        break;

            case 'Register':
            include './pages/register.php';
            break;

            case 'Account':
            if (isset($_SESSION["rol"]) && $_SESSION["rol"]==1)
            {
             include './pages/admin.php';
            }
            else
            {
             isset($_SESSION['auth'])? include './pages/profile.php' : include './pages/login.php';
            }

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
