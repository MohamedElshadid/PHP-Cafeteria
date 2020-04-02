<?php 

include("config.php");


class Category
{
    private $category_name;

    public function setCategoryName($_category_name)
    {
        $this->category_name = Validation::validateText($_category_name);
    }
    public function getCategoryName(){return $this->category_name;}

    public function addCategory()
    {
        $connection = openDB();
        $sqlAdd = "INSERT INTO category ('Name') VALUES ('$this->$category_name')";
        $result =  mysqli_query($connection,$sqlAdd);
        closeDB($connection);
        return $result;
    }
}

?>