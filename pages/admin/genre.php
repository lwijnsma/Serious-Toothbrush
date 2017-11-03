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
							<?php include 'include/admin/admin_table_genre.php'; ?>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-sm-2">
				<form class="nav flex-column" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<button value="add_genre" type="submit" class="btn btn-success" name="profile">add genre
				</button>
			</form>
			</div>
		</div>
	</div>
</div>

