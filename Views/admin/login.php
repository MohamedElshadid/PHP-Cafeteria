<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../public/css/datepicker3.css" rel="stylesheet">
	<link href="../../public/css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" action="../../Controller/userController.php" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Your Email" name="email" type="email" autofocus="">
								<span class="text-danger text-center">
									<?php
									if (isset($_GET["email"])) {
										echo "**** Please Enter Your Email ****";
									}
									?>
								</span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
								<span class="text-danger text-center">
									<?php
									if (isset($_GET["password"])) {
										echo "**** Please Enter Your Password ****";
									}
									?>
								</span>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<div class="form-group text-center">
								<span class="text-danger">
									<?php
									if (isset($_GET["dberror"])) {
										echo "*** Something Wrong In User Name or Passwrod ***";
									}
									?>
								</span>
							</div>
							<input type="submit" name="login" class="btn btn-primary" value="Login">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


	<script src="../../public/js/jquery-1.11.1.min.js"></script>
	<script src="../../public/js/bootstrap.min.js"></script>
</body>

</html>