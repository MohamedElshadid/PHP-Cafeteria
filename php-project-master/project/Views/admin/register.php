<?php
    //include("../../Controller/connection.php");
    $errordata=[];
    $msg ='';
	// $msgClass ='';
    if(isset($_GET["error"]))
        $errordata=explode(',',$_GET["error"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../public/css/bootstrap.css">

    </head>
    <body style="background-color:#101010">
        <div class="container mt-5">
        <div class="alert-danger"> <?php if(in_array("valid",$errordata))echo " Enter Another Mail";?></div>

            <form action="../../Controller/userController.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group">
                        <label class="text-primary font-weight-bold" for="inputName">Name</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter Your Name">
                        <span class="text-danger"> <?php if(in_array("name",$errordata))echo " It's Required";?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-primary font-weight-bold" for="inputEmail4">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Enter Your Email">
                        <span class="text-danger"> <?php if(in_array("email",$errordata))echo " It's Required";?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-primary font-weight-bold" for="inputPassword4">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Enter Your Password">
                        <span class="text-danger"> <?php if(in_array("password",$errordata))echo " It's Required";?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-primary font-weight-bold" for="room">Room</label>
                        <input type="number" name="room" class="form-control" id="room" placeholder="Enter Your Room Number">
                        <span class="text-danger"> <?php if(in_array("room",$errordata))echo " It's Required";?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-primary font-weight-bold" for="inputpic">ProfileImage</label>
                        <input type="file" name="pic" class="form-control" id="inputpic">
                    </div>
                </div>
                <button type="submit" name="register" class="btn btn-primary">Sign in</button>
            </form>
        </div>
        <script src="../../public/js/JQuery-3.3.1.min.js"></script>
        <script src="../../public/js/bootstrap.js"></script>
    </body>
</html>
