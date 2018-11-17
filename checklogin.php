<?php
session_start();
if(isset($_SESSION['admin']))
    echo "admin";
else if(isset($_SESSION['email']))
    echo $_SESSION["email"];
else
    echo 0;
?>