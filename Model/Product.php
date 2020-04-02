<?php 

include("config.php");

class Product
{
    private $productName;
    private $FILE;
    private $category;
    private $price;

    public function setProductName($_productName)
    {
        $this->productName = Validation::validateText($_productName);
    }
    public function getProductName(){return $this->productName;}

    public function setUploadMainImage($_FILE)
    {
        $this->FILE = $_FILE;
    }
    public function getUploadMainImage(){return $this->FILE;}

    public function setCategory($_category)
    {
        $this->category = Validation::validateText($_category);
    }
    public function getCategory(){return $this->category;}

    public function setPrice($_price)
    {
        $this->price = Validation::validateNumber($_price);
    }
    public function getPrice(){return $this->price;}



    //Product Validation Function
    public function productValidation()
    {
        $errorArray = [];
        if(!isset($this->productName) || empty($this->productName))
            $errorArray[]="productName";
        if(!isset($this->quantity) || empty($this->quantity))
            $errorArray[]="quantity";
        if(!isset($this->category) || empty($this->category))
            $errorArray[]="category";
        if(!isset($this->description) || empty($this->description))
            $errorArray[]="description";
        if(!isset($this->price) || empty($this->price))
            $errorArray[]="price";
        //Picture Validation
        $pic_name = $this->FILE["pic"]["name"];
        $allowed_ext = array('gif', 'png', 'jpg');
        $extension = pathinfo($pic_name, PATHINFO_EXTENSION);
        if(!in_array($extension,$allowed_ext))
            $errorArray[] = "error_extension";
        
        return header("Location:../Views/product/product.php?error=".implode(",",$errorArray));
    }

    public function uploadImage()
    {
        $img = $this->$_FILES["img"]["name"];
        $tmp_img = $this->$_FILES["img"]["tmp_name"];
        move_uploaded_file($tmp_img, "../public/images/" . $img);
        return $tmp_img;
    }

    //Add Item
    public function addItem()
    {
        $pic_name = uploadImage();
        $connection = openDB();
        $result = mysqli_query($connection, "INSERT INTO product SET productName = '$productName',
        category = '$category',
        price = '$price',
        pic = '$pic_name'
        ");
        if($result)
            move_uploaded_file($temp_file_name,$dir_to_upload."/".basename($pic_name));
        
        closeDB($connection);
    }
    
    public function editItem($_id)
    {
        $pic_name = uploadImage();
        $connection = openDB();
        $sqlEdit = "UPDATE `product` SET `Name`='$product_name', `Price`='$price', `Category`='$category', `Product_Picture`='$pic_name' WHERE Pid=$_id";
        $result = mysqli_query($connection,$sqlEdit);
        return $result;
    }

    public function deleteItem($_id)
    {
        $connection = openDB();
        $sqlDelete = "DELETE FROM product WHERE Pid=$_id";
        $result = mysqli_query($connection,$sqlDelete);
        return $result;
    }
}

?>