<div class="col">
  <h2 id="white" class="display-4">Album</h2>
      <br>
      <div class="card">
        <div class="card-body">
          <div class="container container-table">
            <div class="table-wrapper">
              <table class="table" cellspacing="0">
                  <tr class="table-heads">
                    <th class="head-item mbr-fonts-style display-7">
                      Album Title
                    </th>
                    <th class="head-item mbr-fonts-style display-7">
                      Artist
                    </th>
                    <th class="head-item mbr-fonts-style display-7">
                      Year
                    </th>
                    <th class="head-item mbr-fonts-style display-7">
                      edit
                    </th>
                    <th class="head-item mbr-fonts-style display-7">
                      delete
                    </th>
                  </tr>

                  <?php include 'include/admin/admin_edit_albums.php'; ?>

                </table>
                <a href="#" title="" class="add-album">Add album</a>
              </div>
            </div>
          </div>
        </div>
  </div>
  <form  action='/index.php' method='post'>
<script type="text/javascript">
 	jQuery(function(){
     var counter = 1;
     jQuery('a.add-album').click(function(event){
        event.preventDefault();

         var newRow = jQuery('<tr><td><input class="form-control" type="text" name="Title" placeholder="Title' +
             counter + '"/></td><td><input class="form-control" type="text" name="Artist" placeholder="Artist' +
             counter + '"/></td><td><input class="form-control" type="text" name="Year" placeholder="Year' +
             counter + '"/></td><td><input class="btn btn-dark" type="submit" value="Add" name="Add'  +
             counter + '"/></td></tr>');
             counter++;
        jQuery('table.table').append(newRow);

     });
 });

 </script>
</form>
<?php include 'include/admin/admin_add_albums.php'; ?>
