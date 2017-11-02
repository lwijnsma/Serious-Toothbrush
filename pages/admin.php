<style>
.nav-link
{
  background: none;
  text-align: left;
  border: none;
  color:#6495ed;
}

.nav-link:hover{
  background: none;
  border: none;
  color:grey;
}
</style>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <h4><?php print $_SESSION["gerbruiker_informatie"]["username"]; ?></h4>
            <p></p>

            <form class="nav flex-column" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <li class="nav-item">
                    <button class="nav-link active" type="submit" name="profile" value="upload">Upload</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" type="submit" name="profile" value="accounts">Manage Accounts</button>
                </li>
				
				<li class="nav-item">
                    <button class="nav-link" type="submit" name="profile" value="tracklist">Edit Tracklist</button>
                </li>

            </form>
            <br>
        </div>
        
        <?php include 'admin/admin_switch.php' ?>
    </div>
</div>