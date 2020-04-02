<?php

include "./connection.php";
$errors = [];
if (isset($_POST["add"])) {


    if (!isset($_POST["product_name"]) || empty($_POST["product_name"])) {
        $errors[] = "product_name";
    }
    if (!isset($_POST["price"]) || empty($_POST["price"])) {
        $errors[] = "price";
    }
    if (!isset($_POST["category"]) || empty($_POST["category"])) {
        $errors[] = "category";
    }
    if (!isset($_FILES["img"]["name"]) || empty($_FILES["img"]["name"])) {
        $errors[] = "img";
    }
    if (count($errors) > 0) {
        $error = implode("&&", $errors);
        header("Location:../Views/products/index.php?$error");
    } else {
        $product_name = trim($_POST["product_name"]);
        $price = trim($_POST["price"]);
        $category = trim($_POST["category"]);
        $img = $_FILES["img"]["name"];
        $tmp_img = $_FILES["img"]["tmp_name"];
        move_uploaded_file($tmp_img, "../public/images/" . $img);
        $sqlAdd = "INSERT INTO `product`( `Name`, `Price`, `Category`, `Product_Picture`) 
                    VALUES ('$product_name','$price','$category','$img')";
        $result = $conn->query($sqlAdd);
        if ($result) {
            header("Location:../Views/products/index.php");
        } else {
            echo $conn->error;
        }
    }
} else if (isset($_POST["edit"])) {


    if (!isset($_POST["product_name"]) || empty($_POST["product_name"])) {
        $errors[] = "product_name";
    }
    if (!isset($_POST["price"]) || empty($_POST["price"])) {
        $errors[] = "price";
    }
    if (!isset($_POST["category"]) || empty($_POST["category"])) {
        $errors[] = "category";
    }
    if (!isset($_FILES["img"]["name"]) || empty($_FILES["img"]["name"])) {
        $errors[] = "img";
    }
    if (count($errors) > 0) {
        $error = implode("&&", $errors);
        header("Location:../Views/products/index.php?$error");
    } else {
        $id = $_POST["id"];
        $product_name = trim($_POST["product_name"]);
        $price = trim($_POST["price"]);
        $category = trim($_POST["category"]);
        $img = $_FILES["img"]["name"];
        $tmp_img = $_FILES["img"]["tmp_name"];
        move_uploaded_file($tmp_img, "../public/images/" . $img);
        $sqlEdit = "UPDATE `product` SET `Name`='$product_name', `Price`='$price', `Category`='$category', `Product_Picture`='$img' WHERE Pid=$id";
        $result = $conn->query($sqlEdit);
        if ($result) {
            header("Location:../Views/products/index.php");
        } else {
            echo $conn->error;
        }
    }
} else if (isset($_GET["id"])) {
    $id = $_GET["id"];
    echo $id;
    $sqlDelete = "DELETE FROM product WHERE Pid=$id";
    $conn->query($sqlDelete);
    header("Location:../Views/products/index.php");
} else if (isset($_POST["addCategory"])) {
    
    if (!isset($_POST["category_name"]) || empty($_POST["category_name"])) {
        $errors[] = "category_name";
    }
    if (count($errors) > 0) {
        $error = implode("&&", $errors);
        header("Location:../Views/products/index.php?$error");
    } else {
        $category_name = $_POST["category_name"];        
        $sqlAdd = "INSERT INTO `category`( `Name`) VALUES ('$category_name')";
        $result = $conn->query($sqlAdd);
        if ($result) {
            header("Location:../Views/products/index.php");
        } else {
            echo $conn->error;
        }
    }
}
