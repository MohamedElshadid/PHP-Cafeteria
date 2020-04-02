<?php
include "connection.php";

if(isset($_GET["order"])){
    $id=$_GET["order"];    
    $sql="UPDATE `orders` SET `Status` = '1' WHERE `orders`.`Oid` = 1";
    $conn->query($sql);
    echo $conn->error;
    header("Location:../Views/products/orders.php");
}