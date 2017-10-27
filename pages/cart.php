

<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col">
			<div class="card card-info">
				<div class="card-heading">
					<div class="card-title">
						<div class="row"  style="margin-top: 20px;">
							<div class="col" style="margin-left: 20px;">
								<h5><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart</h5>
							</div>
							<div class="col" style="margin-right: 20px;">
								<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
								<button type="submit" name="page" class="btn btn-primary btn-sm btn-block" value="Store">
									<i class="fa fa-share" aria-hidden="true"></i> Continue shopping
								</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">



<?php include 'include/cart_items.php'; ?>
					<hr>
				</div>
				<div class="card-footer">
					<div class="row text-center">
						<div class="col">

							<h4 class="text-right">Total € <strong><?php echo number_format($total,2) ?></strong></h4>
						</div>
						<div class="col">
							<button type="button" class="btn btn-success btn-block">
								Checkout
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
