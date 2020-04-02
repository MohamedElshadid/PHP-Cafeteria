<?php
    //require_once("config.php");
class User
{
    private $name;
    private $password;
    private $email;
    private $room;
    private $ext;
    private $FILE;
    public function setFullName($_name)
    {
        $this->name = $_name;
    }
    public function getFullName(){return $this->name;}

    public function setPassword($_password)
    {
        $this->password = $_password;
    }
    public function getPassword(){return $this->password;}

    public function setEmail($_email)
    {
        $this->email = $_email;
    }
    public function getEmail(){return $this->email;}
    
    public function setRoom($_room)
    {
        $this->room = $_room;
    }
    public function getRoom(){return $this->room;}

    public function setExt($_ext)
    {
        $this->ext = $_ext;
    }
    public function getExt(){return $this->ext;}

    public function setFileContent($_FILE)
    {
        $this->FILE = $_FILE;
    }
    public function getFileContent(){return $this->FILE;}

    //Register User Validation Function
    public function registerValidation()
    {
        $errorArray = [];
        if(!isset($this->name) || empty($this->name))
            $errorArray[]="name";
        if(!isset($this->password) || empty($this->password))
            $errorArray[]="password";
        if(!isset($this->email) || empty($this->email) || !filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL))
            $errorArray[]="email";
        if(!isset($this->room) || empty($this->room))
            $errorArray[]="room";
        
        return count($errorArray); 
    }
    //Add User >> Register User
    public function addUser()
    {
        global $db;
        $name = mysqli_escape_string($db,$this->name);
        $password = mysqli_escape_string($db,md5($this->password));
        $email = mysqli_escape_string($db,$this->email);
        $room = mysqli_escape_string($db,$this->room);
        $ext = mysqli_escape_string($db,$this->ext);
        //Picture Section
        $pic=$this->FILE["pic"];
        $picName=$pic["name"];
        $ptmpname=$pic["tmp_name"];

        $select = mysqli_query($db,"SELECT * FROM user where Email = '{$email}'");
        if(mysqli_num_rows($select)>0)
        {
            $errorArray[]="Notvalid";
            return header("Location:../Views/admin/userList.php?error=".implode(",",$errorArray)); 
        }else
        {
            $result = mysqli_query($db,"INSERT INTO user SET User_Name = '$name',
            Password = '$password',
            Email = '$email',
            Room_No  = '$room',
            Profile_Picture = '$picName',
            Ext = '$ext'
            ");
            if($result)
            {
                
                move_uploaded_file($ptmpname, "../public/images/$picName");
                header("Location:../Views/admin/userList.php"); 
            }

        }
    }
    public function getAllUsers()
    {
        global $db;
        $query = "select * from user";
        $result = mysqli_query($db,$query);
        return $result;
    }
    public function deleteUser($id)
    {
        global $db;
        $query = "DELETE FROM user WHERE Uid=$id";
        $result = mysqli_query($db,$query);
        return $result;
    }
    public function editProfile($id)
    {
        global $db;
        $name = mysqli_escape_string($db,$this->name);
        $password = mysqli_escape_string($db,md5($this->password));
        $email = mysqli_escape_string($db,$this->email);
        $room = mysqli_escape_string($db,$this->room);
        $ext = mysqli_escape_string($db,$this->ext);
        //Picture Section
        $pic=$this->FILE["pic"];
        $picName=$pic["name"];
        $ptmpname=$pic["tmp_name"];

        $result = mysqli_query($db,"UPDATE user SET User_Name = '$name',   Email = '$email',
        Room_No  = '$room',
        Profile_Picture = '$picName',
        Ext = '$ext' WHERE Uid = '$id'");
        return $result;
    }

}

?>