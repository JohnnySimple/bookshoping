<!DOCTYPE html>
<html>
<head>
<title>Admin Layout Page</title>
</head>
<Link rel="stylesheet" href="../css/bootstrap.min.css"></Link>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery1.js"></script>

<style>
    .adminlayout-cont1{
        height:650px;
        position:relative;
        top:-50px;
        background-color:#7ecdee;
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

<div class="adminlayout-cont1">
        <div class="" style="border:1px solid #ccc;height:500px;">
            <div class="menu">
                <ul>
                    <li><a href="addbook.php">Add book</a></li>
                    <li><a href="deletebook.php">Delete book</a></li>
                    <li><a href="orders.php">Orders</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
</div>    
</body>
</html>