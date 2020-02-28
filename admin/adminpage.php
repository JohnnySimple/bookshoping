<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<Link rel="stylesheet" href="../css/bootstrap.min.css"></Link>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery1.js"></script>
<style>
    .admin-col{
        float:left;
    }
    .query-box {
        height:100px;
        width:200px;
        float:left;
        margin:0px 20px 0px 0px;
        border-radius:5px;
    }
</style>
<?php
// session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

// querying for number of books in database
$sql_books = "SELECT COUNT(*) FROM Books";
$sql_books_results = mysqli_fetch_array($conn->query($sql_books));
if($sql_books_results != true) {
    echo "Unable to query Books table:" . $conn->error;
}

// querying for number of orders made
$sql_orders = "SELECT COUNT(*) FROM Orders";
$sql_orders_results = mysqli_fetch_array($conn->query($sql_orders));
if($sql_orders_results != true) {
    echo "Unable to query Orders table:" . $conn->error;
}

// querying for number of users in database
$sql_users = "SELECT COUNT(*) FROM Users";
$sql_users_results = mysqli_fetch_array($conn->query($sql_users));
if($sql_users_results != true) {
    echo "Unable to query Orders table:" . $conn->error;
}


// echo strval($sql_books_results);

?>
<body>
    
    <?php require "adminlayout.php" ?>
    <div class="" style="width:100%">
        <div class="admin-col" style="width:15%">
            <?php require "adminsidebar.php" ?>
        </div>
        <div class="admin-col" style="width:80%;margin-left:10px;">
            <div class="query-box" style="background-color:#7ecdee;">
                <div style="margin:20px 0px 0px 10px;">
                    <p>Books <span class="glyphicon glyphicon-book" style="margin-left:100px;"></span></p>
                    <p><?php echo $sql_books_results[0] ?></p>
                </div>
            </div>
            <div class="query-box" style="background-color:#eccc1a;">
                <div style="margin:20px 0px 0px 10px;">
                    <p>Orders <span class="glyphicon glyphicon-book" style="margin-left:100px;"></span></p>
                    <p><?php echo $sql_orders_results[0] ?></p>
                </div>
            </div>
            <div class="query-box" style="background-color:#7efdee;">
                <div style="margin:20px 0px 0px 10px;">
                    <p>Users <span class="glyphicon glyphicon-book" style="margin-left:100px;"></span></p>
                    <p><?php echo $sql_users_results[0] ?></p>
                </div>
            </div>
            <!-- <div class="query-box" style="background-color:#7ecdee;">
                <div style="margin:20px 0px 0px 10px;">
                    <p>Books <span class="glyphicon glyphicon-book" style="margin-left:100px;"></span></p>
                    <p>3</p>
                </div>
            </div> -->
        </div>
    </div>
    
</body>
</html>