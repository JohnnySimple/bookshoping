<!DOCTYPE html>
<html>
<head>
<title>Admin Layout Page</title>
</head>
<Link rel="stylesheet" href="../css/bootstrap.min.css"></Link>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery1.js"></script>

<style>
    .nav{
      z-index:1;
    }
</style>
<?php
session_start();
?>
<body>
<nav class="navbar navbar-inverse nav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="adminpage.php">Admin Panel</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li>
      <a><?php echo $_SESSION["username"]?></a>
      </li>
    </ul>
  </div>
  
</nav>
  
</body>
</html>