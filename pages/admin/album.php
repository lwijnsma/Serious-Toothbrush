<div class="col">
  <h2 id="white" class="display-2">album</h2>
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
                      edit | delete
                    </th>
                  </tr>
                <tr>
                <td class='body-item mbr-fonts-style display-7'><form action="."'".($_SERVER["PHP_SELF"])."'"."method='post'><button class='library-item' type='submit' name='song_own_button' value='{$row['title']}'> {$row['title'] }</button></form></td>
                <td class='body-item mbr-fonts-style display-7'>{$row['artiest']}</td>
                <td class='body-item mbr-fonts-style display-7'>{$row['album_title']}</td>
                <td class='body-item mbr-fonts-style display-7'>button</td>
                </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
