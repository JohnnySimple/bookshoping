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
    <div class="col-md-2">
        <?php require "adminsidebar.php" ?>
    </div>
    <h1>Welcome <?php echo $_SESSION["username"]?></h1>
</body>
</html>