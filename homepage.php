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
    <?php require "homenavbar.php" ?>
    <div align="right" style="margin-right:30px;font-size:20px"><span>Welcome <?php echo $_SESSION["username"] ?></span></div>
    <div class="container">
    <h3>Available Books</h3><hr width="30%" style="margin-left:-30px">
    <div>
        <table class="table table-striped">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price($)</th>
                <th>Purchase</th>
            </tr>
                <?php
                if(isset($_POST["book_id"])) {
                    // echo 'bought' . $_POST["book_id"];
                    $sql_amt = "SELECT price FROM Books WHERE id='$_POST[book_id]'";
                    $res = $conn->query($sql_amt);
                    $result = $res->fetch_assoc();

                    $sql_user_id = "SELECT id FROM Users WHERE username='$_SESSION[username]'";
                    $sql_user_id_res = $conn->query($sql_user_id);
                    $sql_user_id_result = $sql_user_id_res->fetch_assoc();

                    // echo "$result[price] $sql_user_id_result[id] $_POST[book_id]";
                    $sql_order_book = "INSERT INTO Orders(customer_id, book_id, amount)
                    VALUES('$sql_user_id_result[id]', '$_POST[book_id]', '$result[price]')";

                    


                    if($conn->query($sql_order_book) == true) {
                        echo "Successful order!!!";
                        $sql_book_sold = "UPDATE Books SET sold='1' WHERE id=$_POST[book_id]";
                        $sql_book_sold_res = $conn->query($sql_book_sold);

                    } else {
                        echo $conn->error;
                    }
                }

                foreach($books as $row) {
                    if($row['price'] === '0' ) {
                        $amt = 'Free';
                    } else {
                        $amt = 'Buy';
                    }

                    if($row['sold'] == 0){
                        echo "<tr>
                        <tr>
                            <td>$row[title]</td>
                            <td>$row[author]</td>
                            <td>$row[price]</td>
                            <td>
                            <form method='post'>
                                <a href='#'>
                                <button name='book_id' value='$row[id]' class='btn btn-success'>$amt</button>
                                </a>
                            </form>
                            </td>
                        </tr>
                    </tr>";
                    // echo "<div class='col-md-1 book'>
                    //     <h3>$row[title]</h3>
                    //     <span>by - $row[author]</span><br>
                    //     <button class='btn btn-success'>Buy</button>
                    // </div>";
                    }
                    
                }
    ?>
        </table>
    </div>
    
    </div>
</body>

</html>