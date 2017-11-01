<?php include 'include/profile_script.php' ?>

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
            <label for=""> Username </label><input type="text" class="form-control" name="user" value="<?php print $_SESSION["gerbruiker_informatie"]["username"]; ?>" size="20" disabled="true">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
           <label for=""> Current Password </label><input type="password" class="form-control" name="password" value="">
         </div>
         <div class="form-group col-md-4">
           <label for="">New password </label><input type="password" class="form-control" name="password" value="">
         </div>
       </div>
       <div class="row">
        <div class="form-group col-md-8">
         <label for="">Retype new password </label><input type="password" class="form-control" name="password" value="" size="20p">
       </div>
     </div>
     <div class="row">
      <div class="col">
        <button class="btn btn-success" type="submit" name="profile_change" value="Profile_change">change</buttton>
          </div
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
