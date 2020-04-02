<?php 

include_once("config.php");

class Orders
{
    private $id;
    private $Notes;
    private $Date;
    private $Status;
    private $TotalPrice;
    private $Room;
    private $Uid;
    private $Quantity;
    public function setOrderId($_id)
    {
        $this->id = intval($_id);
    }

    public function setOrderNotes($_Notes)
    {
        $this->Notes = $_Notes;
    }
    public function setOrderDate($_date)
    {
        $this->Date = $_date;
    }
    public function setRoomNumber($_Room)
    {
        $this->Room = intval($_Room);
    }
    public function setUserId($_Uid)
    {
        $this->Uid = intval($_Uid);
    }

    public function setTotalPrice($_amount, $_quantity)
    {
        $this->TotalPrice = (intval($_amount) * intval($_quantity));
    }

    public function setQuantity($_quantity)
    {
        $this->Quantity = intval($_quantity);
    }

    // public function returnData()
    // {
    //     return "INSERT INTO orders SET Notes = '$this->Notes' , Date = '$this->Date', Status = 0 , Room = $this->Room, Uid = $this->Uid, TotalPrice = $this->TotalPrice, Quantity = $this->Quantity";
    // }

    // Add Order
    public function addOrder()
    {
        $connection = openDB();
        if($connection){
            $insertQuery = "INSERT INTO orders SET Notes = '$this->Notes' , Date = '$this->Date', Status = 0 , Room = $this->Room, Uid = $this->Uid, TotalPrice = $this->TotalPrice, Quantity = $this->Quantity";
            $res = mysqli_query($connection, $insertQuery);
            closeDB($connection);
            return $res;
        }
    }
    ///////List Orders
    public function listOrders()
    {
        global $db;
        $Uid = mysqli_escape_string($db,$this->Uid);
        $result = mysqli_query($db,"SELECT * FROM orders WHERE `Uid` = '$Uid'");
        return $result;
    }

}
?>