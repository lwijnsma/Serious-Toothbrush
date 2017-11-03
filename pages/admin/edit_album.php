<div class="col">
         <h2 id="white" class="mbr-section-title mbr-fonts-style align-center pb-3 display-4">Add Genre</h2>
   </br>
   <div class="card">
      <div class="card-body">
          <?php include 'include/profile_script.php' ?>
         <form class="" role="form" action="<?php ($_SERVER['PHP_SELF']);?>" method="post">
            <div class="row">              
                  <label for="">Album Title:</label><input type="text" class="form-control" name="titel" value="<?php echo $title; ?>" size="20" ><br>
            </div>
            <div class="row">
               <label for="">Artist:</label><input type="text" class="form-control" name="artist"
   rows="10" cols="50"><?php echo $decription; ?></input>
               </div>
               <div class="row">
               <label for="">year:</label><input type="date" class="form-control" name="year"
   rows="10" cols="50"><?php echo $year; ?></input>
               </div><br>
               <div class="row">
                   <button class="btn btn-success" type="submit" name="album_change" value="album_change">Change</buttton>
                  	</div>
            </form>
      </div>
   </div>
</div>
<?php include 'include/admin/admin_edit_album.php'; ?>