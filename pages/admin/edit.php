<div class="col">
  <h2 id="white" class="display-4">Change Account Details</h2>
   </br>
   <div class="card">
      <div class="card-body">
          <?php include 'include/profile_script.php' ?>
         <form class="" role="form" action="<?php ($_SERVER['PHP_SELF']);?>" method="post">
            <div class="row">
               <div class="col-md-4">
                  <label for=""> Username </label><input type="text" class="form-control" name="user" value="<?php print $_SESSION["gerbruiker_informatie"]["username"]; ?>" size="20" disabled="true">
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <label for=""> Voornaam </label><input type="text" class="form-control" name="profile_name" value="<?php  print $_SESSION["gerbruiker_informatie"]["first_name"]?>">
               </div>
               <div class="col-md-4">
                  <label for="">Achternaam </label><input type="text" class="form-control" name="profile_lastname" value="<?php  print $_SESSION["gerbruiker_informatie"]["last_name"]?>">
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-8">
                  <label for="">Email </label><input type="text" class="form-control" name="profile_email" value="<?php  print $_SESSION["gerbruiker_informatie"]["email"]?>" size="20p">
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <button class="btn btn-success" type="submit" name="profile_change" value="Profile_change">change</buttton>
               </div>
            </div>
            </form>
      </div>
   </div>
</div>
