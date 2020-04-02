<?php
if(isset($_GET["islogout"]))
{
  session_start();
  session_destroy();

  header('location:login.php');
}

?>