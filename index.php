<!DOCTYPE html>
<head>
  <title>serious toothbrush</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>

    .navba {
      margin-bottom: 0;
      border-radius: 0;
	  background-color:#33cccc;
    }
    .navbar li a {
		color:white;
	}

	.navbar li a:hover {
		background-color:#555;
	}
	
    .sidenav {
      padding: 20px;
      background-color: #f1f1f1;
	}

	 .jumbotron {
      margin-bottom: 0;
    }
	
	html {
		position: relative;
		min-height: 100%;
		}
		
	body {
		margin-bottom: 60px;
		}
		
	.footer {
		position: absolute;
		bottom: 0;
		width: 100%;
		height: 60px;
		line-height: 60px; 
		background-color: #555;
		color: white;
		}
		
	@media screen and (max-width: 600px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
     	 .row.content {height:auto;}
    }
	
  </style>
</head>
<body>
<div class="jumbotron">
  <div class="container text-center">
    <h1>Serious Toothbrush</h1>
    <p>slogan</p>
  </div>
</div>
<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
   
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Store</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Library</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user" aria-hidden="true"></i>  Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			<form class="form-inline">
				<input type="text" class="form-control" placeholder="Username/Email">			
				<input type="password" class="form-control" placeholder="Password">
			</form>
			
			<button style="margin:1px;" class="btn btn-sm align-middle btn-outline-success" type="submit">Login</button>
			<button style="margin:1px;" class="btn btn-sm align-middle btn-outline-secondary">Register</button></br>
			
			<a href="#" style="color:grey; margin:5px;">forgot password</a>			
        </div>
      </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>  Cart
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
         
        </div>
      </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">

    <div class="col-sm-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>

    <div class="col-sm-8 text-left">
      <h1>Welcome</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <hr>
      <h3>Test</h3>
      <p>Lorem ipsum...</p>
    </div>

    <div class="col-sm-2 sidenav">
	<div class="card">
      <div class="card-body">
        <h3 class="card-title">Top 10</h3>
		<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
	  </div>
	  </br>
	  <div class="card">
      <div class="card-body">
        <h3 class="card-title">Top 10</h3>
		<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
	  </div>
    </div>

  </div>
</div>

<footer class="footer">
<div class="container">
  <p>Footer Text</p>
  </div>
</footer>
</body>
</html>
