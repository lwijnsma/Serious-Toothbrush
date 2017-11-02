
    <div class="col">
      <h2 id="white" class="display-4">Genre</h2>
      <br>
      <div class="card">
        <div class="card-body">
          <div class="container container-table">
            <div class="table-wrapper">
              <table class="table" cellspacing="0">
                  <tr class="table-heads">
                    <th class="head-item mbr-fonts-style display-7">
                      Genre Title
                    </th>
                    <th class="head-item mbr-fonts-style display-7">
                      Description
                    </th>
                    <th class="head-item mbr-fonts-style display-7">
                      edit
                    </th>
                    <th class="head-item mbr-fonts-style display-7">
                      delete
                    </th>
                  </tr>
                  <tr>
                  <?php include 'include/admin/admin_edit_genre.php'; ?>
                  </tr>
                </table>
                <a href="#" title="" class="add-genre">Add genre</a>
              </div>
            </div>
          </div>
        </div>
      </div>
<script type="text/javascript">
  jQuery(function(){
     var counter = 1;
     jQuery('a.add-genre').click(function(event){
        event.preventDefault();

         var newRow = jQuery('<tr><td><input class="form-control" type="text" name="Title" placeholder="Title' +
             counter + '"/></td><td><input class="form-control" type="text" name="Description" placeholder="Artist' +
             counter + '"/></td><td><input class="btn btn-dark" type="button" value="Add" name="Add'  +
             counter + '"/></td></tr>');
             counter++;
        jQuery('table.table').append(newRow);

     });
 });

 </script>
