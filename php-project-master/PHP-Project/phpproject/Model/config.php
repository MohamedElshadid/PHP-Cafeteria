<?php

    function openDB()
    {
        return mysqli_connect("localhost","root","ashraf","cafeteria");
    }

    function closeDB($connection)
    {
        mysqli_close($connection);
    }

?>