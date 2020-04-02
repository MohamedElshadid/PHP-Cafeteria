<?php include("../includes/header.php") ?>
<?php include("../includes/nav.php") ?>
<?php include("../includes/sidebar.php") ?>



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
			<li class="active">Products</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Products List</h1>
		</div>
	</div>
	<!--/.row-->

	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">
		Add Product
	</button>

	<!-- Modal Add Product -->
	<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form role="form" action="../../Controller/productController.php" method="POST" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Product Name" name="product_name" type="text" autofocus="">
								<span class="text-danger text-center">
									<?php
									if (isset($_GET["product_name"])) {
										echo "**** Please Enter Your Product Name ****";
									}
									?>
								</span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Price" name="price" type="text">
								<span class="text-danger text-center">
									<?php
									if (isset($_GET["price"])) {
										echo "**** Please Enter Product Price  ****";
									}
									?>
								</span>
							</div>
							<div class="form-group">
								<select class="form-control" name="category">
									<option>Choose Category</option>
									<?php
									include("../../controller/connection.php");									
									$sql = "SELECT * FROM category";
									$result = mysqli_query($conn, $sql);
									while ($row = mysqli_fetch_assoc($result)) {
									?>
										<option value="<?php echo $row["Cid"] ?>"><?php echo $row["Name"] ?></option>
									<?php } ?>
								</select>
								<span class="text-danger text-center">
									<?php
									if (isset($_GET["category"])) {
										echo "**** Please Enter product category ****";
										closeDB($conn);
									}
									?>
								</span>
								<!-- Add Category -->
								<button type="button" class="btn btn-link" data-toggle="modal" data-target="#addCategory">
									Add Category
								</button>
								<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form role="form" action="../../Controller/productController.php" method="POST">
													<div class="form-group">
														<input class="form-control" placeholder="Category Name" name="category_name" type="text" autofocus="">
														<span class="text-danger text-center">
															<?php
															if (isset($_GET["category_name"])) {
																echo "**** Please Enter Your Category Name ****";
															}
															?>
														</span>
													</div>
													<input type="submit" name="addCategory" class="btn btn-primary form-control" value="Add Category">
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<input class="form-control" name="img" type="file">
								<span class="text-danger text-center">
									<?php
									if (isset($_GET["img"])) {
										echo "**** Please Choose Your Image ****";
									}
									?>
								</span>
							</div>
							<input type="submit" name="add" class="btn btn-primary form-control" value="Add Product">
						</fieldset>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<table class="table table-striped table-dark m-5">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Product Name</th>
				<th scope="col">Price</th>
				<th scope="col">Category</th>
				<th scope="col">Image</th>
				<th scope="col">Handle</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include("../../controller/connection.php");
			$sqlProduct = "SELECT p.*,p.Name as proName , c.Name as catName FROM product p INNER join category c WHERE p.Category = c.Cid ";
			$resultPro = $conn->query($sqlProduct);
			$count = 0;
			while ($rowPro = $resultPro->fetch_assoc()) {
			?>
				<tr>
					<th scope="row"><?php echo ++$count; ?></th>
					<td><?php echo $rowPro["proName"]; ?></td>
					<td><?php echo $rowPro["Price"]; ?> <b>EGP</b></td>
					<td><?php echo $rowPro["catName"]; ?></td>
					<td><img src="../../public/images/<?php echo $rowPro["Product_Picture"]; ?>" alt="" style="width: 100px; height:100px; border-radius:5px;"></td>
					<td>

						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#editProduct<?php echo $rowPro["Pid"]; ?>">
							Edit
						</button>
						<!-- modal Product Edit-->
						<div class="modal fade" id="editProduct<?php echo $rowPro["Pid"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Edit Product</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form role="form" action="../../Controller/productController.php" method="POST" enctype="multipart/form-data">
											<fieldset>
												<div class="form-group">
													<input type="text" name="id" id="" value="<?php echo $rowPro["Pid"]; ?>" hidden>
													<input class="form-control" placeholder="Product Name" name="product_name" type="text" autofocus="" value="<?php echo $rowPro["proName"]; ?>">
													<span class="text-danger text-center">
														<?php
														if (isset($_GET["product_name"])) {
															echo "**** Please Enter Your Product Name ****";
														}
														?>
													</span>
												</div>
												<div class="form-group">
													<input class="form-control" placeholder="Price" name="price" type="text" value="<?php echo $rowPro["Price"]; ?>">
													<span class="text-danger text-center">
														<?php
														if (isset($_GET["price"])) {
															echo "**** Please Enter Product Price  ****";
														}
														?>
													</span>
												</div>
												<div class="form-group">
													<select class="form-control" name="category">
														<option>Choose Category</option>
														<?php
														include("../../controller/connection.php");
														$sql = "SELECT * FROM category";
														$result = $conn->query($sql);
														while ($row = $result->fetch_assoc()) {
														?>
															<option value="<?php echo $row["Cid"] ?>" <?php if ($rowPro["catName"] == $row["Name"]) {
																											echo "selected";
																										} ?>><?php echo $row["Name"] ?></option>
														<?php } ?>

													</select>
													<span class="text-danger text-center">
														<?php
														if (isset($_GET["category"])) {
															echo "**** Please Enter product category ****";
														}
														?>
													</span>
												</div>
												<div class="form-group">
													<img src="../public/images/<?php echo $rowPro["Product_Picture"]; ?>" alt="" style="width: 50px;height:50px ;border-radius:5px;">
													<input class="form-control" name="img" type="file">
													<span class="text-danger text-center">
														<?php
														if (isset($_GET["img"])) {
															echo "**** Please Choose Your Image ****";
														}
														?>
													</span>
												</div>
												<input type="submit" name="edit" class="btn btn-primary form-control" value="Edit Product">
											</fieldset>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>

						<!-- modal Delete Product -->
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteProduct<?php echo $rowPro["Pid"]; ?>">
							Delete
						</button>
						<div class="modal fade" id="deleteProduct<?php echo $rowPro["Pid"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Delete Product</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p class="text-danger">Are You Sure To Delete This Product ?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<a href="../../Controller/productController.php?id=<?php echo $rowPro["Pid"]; ?>" class="btn btn-danger">Yes</a>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

</div>
<!--/.main-->
<?php include("../includes/footer.php") ?>