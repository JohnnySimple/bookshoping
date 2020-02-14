<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<Link rel="stylesheet" href="../css/bootstrap.min.css"></Link>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery1.js"></script>

<?php
session_start();
?>
<body>
    <?php require "adminlayout.php" ?>
    <h1>Welcom <?php echo $_SESSION["username"]?></h1>
</body>
</html>