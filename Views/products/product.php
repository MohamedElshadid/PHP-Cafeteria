<?php
    $errordata=[];
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
            <form action="../../Controller/productController.php" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group">
                        <label class="text-primary font-weight-bold" for="inputName">productName</label>
                        <input type="text" name="productName" class="form-control" id="inputName" placeholder="Enter Your productName">
                        <span class="text-danger"> <?php if(in_array("productName",$errordata))echo " It's Required";?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-primary font-weight-bold" for="quantity">quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Your quantity">
                        <span class="text-danger"> <?php if(in_array("quantity",$errordata))echo " It's Required";?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-primary font-weight-bold" for="category">category</label>
                        <input type="text" name="category" class="form-control" id="category" placeholder="Enter Your category">
                        <span class="text-danger"> <?php if(in_array("category",$errordata))echo " It's Required";?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-primary font-weight-bold" for="description">description</label>
                        <input type="text" name="description" class="form-control" id="description">
                        <span class="text-danger"> <?php if(in_array("description",$errordata))echo " It's Required";?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-primary font-weight-bold" for="price">price</label>
                        <input type="number" name="price" class="form-control" id="price">
                        <span class="text-danger"> <?php if(in_array("price",$errordata))echo " It's Required";?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-primary font-weight-bold" for="inputpic">itemImage</label>
                        <input type="file" name="pic" class="form-control" id="inputpic">
                    </div>
                </div>
                <button type="submit" name="addItem" class="btn btn-primary">Add Item</button>
            </form>
        </div>
        <script src="../../public/js/JQuery-3.3.1.min.js"></script>
        <script src="../../public/js/bootstrap.js"></script>
    </body>
</html>
