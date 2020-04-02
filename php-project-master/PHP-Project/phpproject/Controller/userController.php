<?php
    require_once '..' . DIRECTORY_SEPARATOR . 'Config.php';
    //require_once("config.php");
    //require_once("../Model/User.php");
    $user = new User();
    if(isset($_POST['addUser']))
    {    
        $user->setFullName($_POST['name']);
        $user->setPassword($_POST['password']);
        $user->setEmail($_POST['email']);
        $user->setRoom($_POST['room']);
        $user->setExt($_POST['ext']);
        $user->setFileContent($_FILES);
        if($user->registerValidation() == 0)
            $user->addUser();
        else
            return header("Location:../Views/admin/userList.php");
    }
    if(isset($_POST['login']))
    {
        if($_POST['email']=="admin@os.iti" && $_POST['password']=="123")
        {
            $_SESSION['admin'] = "Elshadid";
            return header("Location:../Views/admin/userList.php");
        }
            
        else{
            $email=mysqli_escape_string($db,$_POST['email']);
            $password=mysqli_escape_string($db,$_POST['password']);
            $result=mysqli_query($db,"select * from user where Email='{$email}' && Password='{$password}'");
     
     
            if(mysqli_num_rows($result)>0){
                $result=mysqli_fetch_assoc($result);
            
                $_SESSION["user"]=$result['User_Name'];
                $_SESSION["id"]=$result["Uid"];
                $_SESSION["room"]=$result["Room_No"];
                header("Location:../Views/client/index.php");
            }else{
            
            header("Location:../Views/admin/login.php");
            }
     
          }
    } 

    else if (isset($_GET["id"])) {
        $id = $_GET["id"];
        if($user->deleteUser($id))
            header("Location:../Views/admin/userList.php"); 
    }
    else if(isset($_POST['edit'])){
        //echo $_POST['id'];
        $user->setFullName($_POST['name']);
        $user->setPassword($_POST['password']);
        $user->setEmail($_POST['email']);
        $user->setRoom($_POST['room']);
        $user->setExt($_POST['ext']);
        $user->setFileContent($_FILES);
        $user->editProfile($_POST['id']);
        header("Location:../Views/admin/userList.php"); 
    }