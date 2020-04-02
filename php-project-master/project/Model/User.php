<?php

require_once("config.php");

class User
{
    private $name;
    private $password;
    private $email;
    private $room;
    private $FILE;
    public function setFullName($_name)
    {
        $this->name = Validation::validateText($_name);
    }
    public function getFullName(){return $this->name;}

    public function setPassword($_password)
    {
        $this->password = Validation::validateText($_password);
    }
    public function getPassword(){return $this->password;}

    public function setEmail($_email)
    {
        $this->email = Validation::validateEmail($_email);
    }
    public function getEmail(){return $this->email;}
    
    public function setRoom($_room)
    {
        $this->room = Validation::validateNumber($_room);
    }
    public function getRoom(){return $this->room;}

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
        //Picture Validation
        $pic_name = $this->FILE["pic"]["name"];
        $allowed_ext = array('gif', 'png', 'jpg');
        $extension = pathinfo($pic_name, PATHINFO_EXTENSION);
        if(!in_array($extension,$allowed_ext))
            $errorArray[] = "error_extension";
        
        return header("Location:../Views/user/register.php?error=".implode(",",$errorArray));
    }
    //Add User >> Register User
    public function addUser()
    {
        global $db;
        global $msg;
        global $msgClass;
        $name = mysqli_escape_string($db,$this->name);
        $password = mysqli_escape_string($db,md5($this->password));
        $email = mysqli_escape_string($db,$this->email);
        $room = mysqli_escape_string($db,$this->room);
        //Picture Section
        $dir_to_upload = "../Public/images";
        $temp_file_name = $this->FILE["pic"]["tmp_name"];
        $pic_name = $this->FILE["pic"]["name"];
        $select = mysqli_query($db,"SELECT * FROM user where email = '{$email}'");
        if(mysqli_num_rows($select)>0)
        {
            $errorArray[]="valid";
            return header("Location:../Views/user/register.php?error=".implode(",",$errorArray)); 
        }else
        {
            $result = mysqli_query($db,"INSERT INTO user SET name = '$name',
            password = '$password',
            email = '$email',
            room = '$room',
            pic = '$pic_name'
            ");
            if($result)
                move_uploaded_file($temp_file_name,$dir_to_upload."/".basename($pic_name));
        }
    }
    
    // login..
    public function loginUser($_email, $_pass)
    {
        $this->password = $_email;
        $this->email = $_pass;
        $connect = openDB();
        if($connect)
        {
            $loginUserQuery = "SELECT * FROM users  WHERE email = {$this->email} AND password = {$this->password};";
            $res = mysqli_query($connect, $loginUserQuery);
            closeDB($connect);
            return $res;
        }
    }
}

?>