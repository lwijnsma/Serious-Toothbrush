<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <h4>User Name</h4>
      <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="#">Edit Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Change password</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Orders</a>
  </li>
</ul><br>
    </div>


    <div class="col">
    </br>
       <div class="card">
  <div class="card-body">
     <form class="" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                        <legend>Account Details</legend>
                        <div class="row">
      <div class="form-group col-md-4">
      <label for=""> Username </label><input type="text" class="form-control" name="user" value="<?php if(isset($_POST['user'])){echo$_POST['user'];}?>" size="20">
      </div>
    </div>
    <div class="row">
  <div class="form-group col-md-4">
       <label for=""> Voornaam </label><input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])){echo$_POST['name']; }?>">
      </div>
    <div class="form-group col-md-4">
       <label for="">Achternaam </label><input type="text" class="form-control" name="lastname" value="<?php if(isset($_POST['lastname'])){echo$_POST['lastname'];}?>">
      </div>
    </div>
    <div class="row">
    <div class="form-group col-md-8">
       <label for="">email </label><input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])){echo$_POST['email'];}?>" size="20p">
      </div>
    </div>
 <div class="row">
     &nbsp;&nbsp;&nbsp; <input class="btn btn-success" type="submit" name="change" value="change">
 </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
    