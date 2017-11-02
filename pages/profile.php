<br><br>
<div class="container-fluid">
   <div class="row content">
      <div class="col-sm-2 sidenav">
      </div>
      <div class="col">
          <h2 id="white" class="mbr-section-title mbr-fonts-style align-center pb-3 display-4">Change Account Details</h2>
      </div>
      <div class="col-sm-2 sidenav">
      </div>
   </div>
   <div class="row content">
      <div class="col-sm-2 sidenav">
         <h4 id="white"><?php print $_SESSION["gerbruiker_informatie"]["username"]; ?></h4>
         <br>
         <form class="nav flex-column" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <button class="nav-link" type="submit" name="profile" value="Edit">Edit Profile</button>
               </li>
               <li class="nav-item">
                  <button class="nav-link" type="submit" name="profile" value="Password">Change password</button>
               </li>
               <br>
               <li class="nav-item">
                  <b><a class="btn btn-danger" href="logout.php">Logout</a></b>
               </li>
            </ul>
         </form>
         <br>
      </div>
      <?php include 'profile/profile_switch.php' ?>
      <div class="col-sm-2">
      </div>
   </div>
</div>
