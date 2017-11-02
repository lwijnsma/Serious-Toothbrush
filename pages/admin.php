<div class="container-fluid">
  <br>
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <h4 id='white'><?php print $_SESSION["gerbruiker_informatie"]["username"]; ?></h4>
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
                <li class="nav-item">
                    <button class="nav-link" type="submit" name="profile" value="genre">Edit Genres</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" type="submit" name="profile" value="album">Edit Albums</button>
                </li>
                <br>
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
            </form>
            <br>
        </div>
        <?php include 'admin/admin_switch.php' ?>
        <div class="col-sm-2">
        </div>
    </div>
</div>
