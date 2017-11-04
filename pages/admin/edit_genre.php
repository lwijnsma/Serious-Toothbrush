<div class="col">
         <h2 id="white" class="mbr-section-title mbr-fonts-style align-center pb-3 display-4">edit Genre</h2>
   </br>
   <div class="card">
      <div class="card-body">

 <?php include 'include\admin\admin_edit_genre.php'; ?>
         <form class="" role="form" action="<?php ($_SERVER['PHP_SELF']);?>" method="post">
            <div class="row">
               <div class="col-md-4">
                  <label for=""> Genre </label><input type="text" class="form-control" name="title" value="<?php echo $title; ?>" size="20" ><br>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-8">
               <textarea class="form-control" name="description" rows="10" cols="50" ><?php echo $description; ?></textarea>
               </div>
            </div><br>
               <div class="row">
                   <button class="btn btn-success" type="submit" name="genre_change" value="genre_change">Change</buttton>
                  	</div>
            </form>
      </div>
   </div>
</div>
