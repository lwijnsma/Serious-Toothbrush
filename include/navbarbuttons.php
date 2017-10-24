<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

<div class="collapse navbar-collapse" id="navbarNav">
<form class="navbar-nav mr-auto" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="height: 30px;">
  <button type="submit" class="nav-item" name="page" value="Home">Home</button>
  <button type="submit" class="nav-item" name="page" value="Store">Store</button>
  <button type="submit" class="nav-item" name="page" value="Library">Library</button>
</form>


      <form class="nav navbar-nav ml-auto" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <button  type="submit" class="nav-item" name="page" value="Account"><i class="fa fa-user" aria-hidden="true"></i> Account</button>

        <button type="submit" class="nav-item" name="page" value="Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Cart</button>

      </form>

    </div>
  </div>
</nav>
<?php include 'nav_switch.php' ?>
