<?php
session_start();
$_SESSION["loggedin"] = false;
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location:login.php");
?>