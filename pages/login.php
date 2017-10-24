
</br>
<div class="container">
 <div class="row justify-content-md-center">
<div class="card">
 <div class="card-body">
     <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
       <h2 class="form-signin-heading">Login</h2>
       </br>

       <input type="text" name="user" value="" size="20" class="form-control" placeholder="Username" />
     </br>
       <input type="password" name="password" value="" size="20" class="form-control" placeholder="Password" />
     </br>
     <div class="row justify-content-md-center">
       <div class="col">
       <input type="submit" name="" class="btn btn-lg btn-success" value="login">

     </div>
       <div class="col">
   <Button type="submit" Class="btn btn-lg btn-primary" value="Register" name="page">Register</button>
 </div>
 </div>
<br>
   </form>
   <?php include 'include/login_script.php'; ?>
</div>
</div>
   </div>
 </div>
