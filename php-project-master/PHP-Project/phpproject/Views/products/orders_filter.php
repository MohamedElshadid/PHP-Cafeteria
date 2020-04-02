<?php include("../includes/header.php") ?>
<?php include("../includes/nav.php") ?>
<?php include("../includes/sidebar.php") ?>



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Orders</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Orders List</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
    </div>

    <table class="table table-striped table-dark m-5">
        <thead>
            <tr>
                <th scope="col">Order Date</th>
                <th scope="col">Client Name</th>
                <th scope="col">Room</th>
                <th scope="col">Ext</th>
                <th scope="col">description</th>
                <th scope="col">Action</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("../../controller/connection.php");
            $from = $_POST["from"];
            $to = $_POST["to"];
            $sqlOrder = "SELECT o.*,u.User_Name,u.Ext FROM `orders` o INNER JOIN `user` u ON o.Uid=u.Uid WHERE (o.Date BETWEEN CAST('$from' AS Date) AND CAST('$to' AS Date))";
            $resultOrd = $conn->query($sqlOrder);
            while ($rowOrd = $resultOrd->fetch_assoc()) {
            ?>
                <tr>
                    <th scope="row"><?php echo $rowOrd["Date"] ?></th>
                    <td><?php echo $rowOrd["User_Name"]; ?></td>
                    <td><?php echo $rowOrd["Room"]; ?> <b>EGP</b></td>
                    <td><?php echo $rowOrd["Ext"]; ?></td>
                    <td><?php echo $rowOrd["Note"]; ?></td>
                    <td><?php if($rowOrd["Status"]==1){echo "Deliver" ;}else{echo "Not Deliver" ;} ?></td>
                    <td><a href="../../Controller/OrdersController.php?order=<?php echo $rowOrd["Oid"]?>" class="btn btn-success">Confirm</a></td>

                </tr>
                <tr>
                    <td colspan="7">
                        <?php
                        $orderId=$rowOrd["Oid"];
                        $sqlorder_pro="SELECT * FROM `product_order` po INNER JOIN product p WHERE po.Oid=$orderId and po.Pid=p.Pid";
                        $resultOrd_pro=$conn->query($sqlorder_pro);
                        while ($rowOrd_pro = $resultOrd_pro->fetch_assoc()) {?>
                        <div class="order">
                            <img src="../../public/images/<?php echo $rowOrd_pro["Product_Picture"] ?>" alt="">
                            <span><?php echo $rowOrd_pro["Price"] ?> LE</span>
                            <p><?php echo $rowOrd_pro["Amount"] ?></p>
                        </div>
                        <?php }?>
                        <p class="total">Total : <?php echo $rowOrd["TotalPrice"] ?> EGP</p>
                    </td>
                    
                </tr>
                <?php } ?>
        </tbody>
    </table>

</div>
<!--/.main-->
<?php include("../includes/footer.php") ?>