<nav class="navbar sticky-top navbar-expand-lg navbar-dark" id="navbar">
	<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse " id="navbarNav">
				<form class="ml-auto" action="<?php ($_SERVER["PHP_SELF"]);?>" method="post">  
					<ul class="navbar-nav" style="">
					<li class="nav-item"><button type="submit" class="nav-link" name="page" value="Home">Home</button></li>
					<li class="nav-item"><button type="submit" class="nav-link" name="page" value="Store">Store</button></li>
					<li class="nav-item"><button type="submit" class="nav-link" name="page" value="Library">Library</button></li>
					<li class="nav-item"><button  type="submit" class="nav-link" name="page" value="Account"><i class="fa fa-user" aria-hidden="true"></i> Account</button></li>
					<li class="nav-item"><button type="submit" class="nav-link" name="page" value="Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Cart</button></li>
					</ul>
				</form>
		</div>
	</div>
</nav>
