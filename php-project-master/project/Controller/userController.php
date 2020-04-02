<?php
    require_once '..' . DIRECTORY_SEPARATOR . 'config.php';
    $user = new User();
    if(isset($_POST['register']))
    {    
        $user->setFullName($_POST['name']);
        $user->setPassword($_POST['password']);
        $user->setEmail($_POST['email']);
        $user->setRoom($_POST['room']);
        $user->setFileContent($_FILES);
        if($user->registerValidation() == 0)
            $user->addUser();
        else
            echo "Not Insert";
    }

    if(isset($_POST['login']))
    {
        $res = $user->loginUser($_POST['email'], $_POST['password']);
        if(len($res) > 0)
            return header("Location:../Views/admin/home.php?error=");
        else
            return header("Location:../Views/admin/home.php?error=invalid");
    } 