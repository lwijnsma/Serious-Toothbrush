 </br>

 <div class="container">
 	
        <div class="row justify-content-md-center"">
          <div class="card" style="width: 40rem;">
  <div class="card-body">
 <form class="" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                        <legend>Account Details</legend>
                        <div class="row">
      <div class="form-group col-md-6">
      <label for=""> Username </label><input type="text" class="form-control" name="user" value="<?php if(isset($_POST['user'])){echo$_POST['user'];}?>" size="20">
    	</div>
    </div>
    <div class="row">
 	<div class="form-group col-md-6">
       <label for=""> Voornaam </label><input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name'])){echo$_POST['name']; }?>">
   	 	</div>
    <div class="form-group col-md-6">
       <label for="">Achternaam </label><input type="text" class="form-control" name="lastname" value="<?php if(isset($_POST['lastname'])){echo$_POST['lastname'];}?>">
    	</div>
    </div>
    <div class="row">
    <div class="form-group col-md-12">
       <label for="">email </label><input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])){echo$_POST['email'];}?>" size="20p">
    	</div>
    </div>
    	<div class="row">
    <div class="form-group col-md-6">
      <label for=""> Wachtwoord  </label><input type="password" class="form-control" name="password" value="" size="20">
    	</div>
    <div class="form-group col-md-6">
      <label for=""> Wachtwoord opnieuw  </label><input type="password" class="form-control"  name="repassword" value="" size="20">
    	</div>
    </div>
       <input class="btn btn-success" type="submit" name="register" value="registreer">
      </form>
  </div>
</div>
</div>
</div>

      <?php include 'include/register_script.php'; ?>

