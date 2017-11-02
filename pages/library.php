<?php include('include/library_detail_navigation.php');?>


<br><br>
<div class="container-fluid">
   <div class="row content">
      <div class="col-sm-2 sidenav">
      </div>
      <div class="col">
        <h4 id="white" class="mbr-section-title mbr-fonts-style align-center display-4">Library</h4>
     </div>
     <div class="col-sm-2 sidenav">
     </div>
  </div>
  <div class="row content">
   <div class="col-sm-2 sidenav">
   </div>
   <div class="col">
      <br>
      <div class="card">
         <div class="card-body">
            <div class="container container-table">
               <div class="table-wrapper">
                  <div class="container">
                     <div class="row search">
                        <div class="col-md-6"></div>
                     </div>
                     <div class="container scroll">
                        <nav aria-label="Page navigation">
                           <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                              <input class="form-control mr-sm-2" type="search" name="library_search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                           </form>
                           <table class="table" cellspacing="0" id='library-table'>
                              <thead>
                                 <tr class="table-heads">
                                    <th class="head-item mbr-fonts-style display-7">
                                       NAME
                                    </th>
                                    <th class="head-item mbr-fonts-style display-7">
                                       Artist
                                    </th>
                                    <th class="head-item mbr-fonts-style display-7">
                                       Album
                                    </th>
                                    <th class="head-item mbr-fonts-style display-7">
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php include("include/library_table_input.php"); ?>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <br>
            <div class="card">
               <div class="card-body">
                  <div id='audio-player'>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-2 sidenav">
          <h4 style="color: white;">Que</h4>
          <ul class="nav flex-column" id="queue">
            <li class="nav-item">
              <a class="nav-link" href="#">Song 1</a>
           </li>
           <li class="nav-item">
              <a class="nav-link" href="#">Song 2</a>
           </li>
           <li class="nav-item">
              <a class="nav-link" href="#">Song 3</a>
           </li>
        </ul>
     </div>
  </div>
</div>

<script src='js/player.js'></script>
