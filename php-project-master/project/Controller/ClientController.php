<?php

include_once("../Model/Orders.php");

if($_POST["item_id"]){
    $order = new Orders();
    // var_dump($_POST);
    $order->setOrderId($_POST["item_id"]);
    $order->setOrderNotes("notes");
    $order->setOrderDate(date("Y/m/d"));
    $order->setRoomNumber($_POST["room_number"]);
    $order->setUserId($_POST["user_id"]);
    $order->setTotalPrice($_POST["amount"],$_POST["quantity"]);
    $order->setQuantity($_POST["quantity"]);
        
    $res = $order->addOrder();

    if($res)
        header("Location:../Views/client/index.php");
    else
        echo "faild";
}