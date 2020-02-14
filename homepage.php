<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery1.js"></script>
<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<body>
    <h1>Welcome <?php echo $_SESSION["username"] ?></h1>
</body>

</html>