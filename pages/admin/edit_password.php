 <div class="col">
   <h2 id="white" class="display-4">Edit Password</h2>
 	<br>
       <div class="card">
  <div class="card-body">
     <form class="" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

                        <div class="row">
      <div class="form-group col-md-4">
      <label for="">Existing Password </label><input type="password" class="form-control" name="password" >
      </div>
    </div>
    <div class="row">
  <div class="form-group col-md-4">
       <label for=""> password </label><input type="password" class="form-control" name="npassword" >
      </div>
    <div class="form-group col-md-4">
       <label for="">re password </label><input type="password" class="form-control" name="repassword" >
      </div>
    </div>
 <div class="row">
 	<div class="col">
      <button class="btn btn-success" type="submit" name="password_change" value="password_change">Change</buttton>
     	</div
 </div>
      </form>
    </div>
</br>
    <?php include 'include/password_script.php' ?>
  </div>
</div>
</div>
