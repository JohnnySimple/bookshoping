<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<?php 
    session_start();
?>
<Link rel="stylesheet" href="../css/bootstrap.min.css"></Link>
<Link rel="stylesheet" href="css/styles.css"></Link>
<Link rel="stylesheet" href="css/animate.css"></Link>
<Link rel="stylesheet" href="css/all.css"></Link>
<Link rel="stylesheet" href="css/fontawesome.css"></Link>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery1.js"></script>
<script src="js/brands.js"></script>
<script src="js/solid.js"></script>
<body>
<?php require "homenavbar.php" ?>
<div class="container-fluid cont1" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
    url('imgs/library1.jpeg');height:700px;position:absolute;top:-50px;z-index:-1;width:100%">
    
<div class="background-text" align="center">
    <p class="wow fadeInUp">Welcome to your online library.</p>
    <div>
        <a href="register.php"><button class="btn btn-primary wow fadeInLeft">Register</button></a>
        <a href="login.php"><button class="btn btn-primary wow fadeInRight">Login</button></a>
    </div>
</div>

</div>
<script src="js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
</body>
</html>