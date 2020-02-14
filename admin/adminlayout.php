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
    .adminlayout-cont1{
        height:500px;
        position:relative;
        top:-50px;
    }
    .menu{
        margin-top:77px;
        margin-left:-30px;
    }
    .menu li{
        list-style-type:none;
        margin:10px 0px 10px 0px;
        font-size:20px;
    }
</style>

<body>
<nav class="navbar navbar-default nav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Logout</a></li> 
    </ul>
  </div>
</nav>

<div class="container-fluid adminlayout-cont1">
    <div class="row">
        <div class="col-md-2" style="border:1px solid #ccc;
        height:500px">
            <div class="menu">
                <ul>
                    <li><a href="#">Add book</a></li>
                    <li><a href="#">Delete book</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>    
</body>
</html>