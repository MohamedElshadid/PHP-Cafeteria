<?php include_once("header.php"); ?>

<?php include_once("navBar.php"); ?>

	<div class="top-brands">
		<div class="container">
			<h3>Our Products</h3>
			<div class="agile_top_brands_grids">
			<?php
				include_once("../../Model/config.php");
				$connection = openDB();
				$productsQuery = "SELECT * FROM product";
				$result = mysqli_query($connection, $productsQuery);
				if($result)
				{
					while($product = mysqli_fetch_assoc($result))
					{
			?>
						<div class="col-md-3 top_brand_left">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="tag"><img src="../../public/images/tag.png" alt=" " class="img-responsive" /></div>
									<div class="agile_top_brand_left_grid1">
										<figure>
											<div class="snipcart-item block" >
												<div class="snipcart-thumb">
													<a href="single.html"><img title=" " alt=" " src="../../public/images/<?php echo $product["Product_Picture"]; ?>" /></a>		
													<p><?php echo $product["Name"]; ?></p>
													<h4>LE <?php echo $product["Price"]; ?></h4>
												</div>
												<div class="snipcart-details top_brand_home_details">
													<form action="#" method="post">
														<fieldset>
															<input type="hidden" name="cmd" value="_cart" />
															<input type="hidden" name="add" value="1" />
															<input type="hidden" name="business" value=" " />
															<input type="hidden" name="user_id" value="2" />
															<input type="hidden" name="room_number" value="25" />
															<input type="hidden" name="item_id" value="<?php echo $product["Pid"]; ?>" />
															<input type="hidden" name="item_name" value="<?php echo $product["Name"]; ?>" />
															<input type="hidden" name="amount" value="<?php echo $product["Price"]; ?>" />
															<input type="hidden" name="discount_amount" value="0.00" />
															<input type="hidden" name="currency_code" value="LE" />
															<input type="hidden" name="return" value=" " />
															<input type="hidden" name="cancel_return" value=" " />
															<input type="submit" name="submit" value="Add to cart" class="button" />
														</fieldset>
															
													</form>
												</div>
											</div>
										</figure>
									</div>
								</div>
							</div>
						</div>
			<?php 		
					}
					closeDB($connection);
				}else
				{
				?> 
					<h3> No Products Added Yet... </h3>
				<?php
				}
			?>
			</div>
		</div>
	</div>
<!-- //top-brands -->

<?php include_once("footer.php"); ?>