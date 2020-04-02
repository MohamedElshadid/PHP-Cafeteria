<?php

    function openDB()
    {
        return mysqli_connect("localhost","root","","cafeteria");
    }

    function closeDB($connection)
    {
        mysqli_close($connection);
    }

?>