<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <br>
    </div>
    <div class="col">
    </br>
    <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">Store</h2>
       <div class="card">
  <div class="card-body">
     <div class="container container-table">
      <div class="table-wrapper">
        <div class="container">
          <div class="row search">
            <div class="col-md-6"></div>
        </div>
        <div class="container scroll">
     <nav aria-label="Page navigation ">
      <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input class="form-control mr-sm-2" type="search" name="store_search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>



  </form>
  


          <table class="table" cellspacing="0">
            <thead>
              <tr class="table-heads ">

              <th class="head-item mbr-fonts-style display-7">
                      NAME</th><th class="head-item mbr-fonts-style display-7">
                      Artist</th><th class="head-item mbr-fonts-style display-7">
                      Album</th><th class="head-item mbr-fonts-style display-7">
                      Price</th></tr>
            </thead>
            <tbody>

            <?php include("include/store_table_input.php"); ?>

          </table>
        </div>
    </div>
    </div>
  </div>
</div>
</div>
</div>
<div class="col-sm-2 sidenav">
      <div class="card">
  <div class="card-body">
    <h4 class="card-title">Top 10</h4>
     <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="#">Song 1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Song 2</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Song 3</a>
  </li>
</ul><br
  </div>
</div>
    </div>
</div>
</div>
