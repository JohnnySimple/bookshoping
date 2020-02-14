<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery1.js"></script>

<style>

.book{
    box-shadow: 0px 0px 5px #000;
    margin:0px 5px 0px 5px;
    height:200px;
}

</style>
<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "bookshop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Books";
    $books = $conn->query($sql);
    if($books != true) {
        echo "Lela awu" . $conn->error;
    }

?>
<body>
    <div align="right" style="margin-right:30px;font-size:20px"><span>Welcome <?php echo $_SESSION["username"] ?></span></div>
    <div class="container">
    <h3>Available Books</h3><hr width="70%">
    <div>
        <table class="table table-striped">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price($)</th>
                <th>Purchase</th>
            </tr>
                <?php
                foreach($books as $row) {
                    echo "<tr>
                        <tr>
                            <td>$row[title]</td>
                            <td>$row[author]</td>
                            <td>$row[price]</td>
                            <td><button class='btn btn-success'>Buy</button></td>
                        </tr>
                    </tr>";
                    // echo "<div class='col-md-1 book'>
                    //     <h3>$row[title]</h3>
                    //     <span>by - $row[author]</span><br>
                    //     <button class='btn btn-success'>Buy</button>
                    // </div>";
                }
    ?>
        </table>
    </div>
    
    </div>
</body>

</html>