<div class="col">
         <h2 id="white" class="mbr-section-title mbr-fonts-style align-center pb-3 display-4">Change Account Details</h2>
   </br>
   <div class="card">
      <div class="card-body">
          <?php include 'include/admin/admin_edit_account.php';?>
         <form class="" role="form" action="<?php ($_SERVER['PHP_SELF']);?>" method="post">
            <div class="row">
               <div class="col-md-4">
                  <label for=""> Username </label><input type="text" class="form-control" name="user" value="<?php print $_SESSION["edit_button_value"]; ?>" size="20" disabled="true">
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <label for=""> Voornaam </label><input type="text" class="form-control" name="profile_name" value="<?php  print $first_name?>">
               </div>
               <div class="col-md-4">
                  <label for="">Achternaam </label><input type="text" class="form-control" name="profile_lastname" value="<?php  print $last_name?>">
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-8">
                  <label for="">Email </label><input type="text" class="form-control" name="profile_email" value="<?php  print $email?>" size="20p">
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
