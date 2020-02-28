<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
</head>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookshop";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Orders";
    $results = $conn->query($sql);
    if($results != true) {
        echo "Unable to query Orders table" . $conn->error;
    }

    // function to return book title using the foreign key book_id in the orders table
    function bookTitle($id){
        global $conn;
        $sql_book = "SELECT title FROM Books WHERE id=$id";
        $sql_book_res = mysqli_fetch_assoc($conn->query($sql_book));
        if($sql_book_res != true) {
            echo "Unable to query Books table:" . $conn->error;
        }

        return $sql_book_res['title'];
    };

    // function to return customer name using the foreign key customer_id in the orders table
    function customerName($id) {
        global $conn;
        $sql_customer = "SELECT username FROM Users WHERE id=$id";
        $sql_customer_res = mysqli_fetch_assoc($conn->query($sql_customer));
        if($sql_customer_res != true) {
            echo "Unable to query Users table:" . $conn->error;
        }

        return $sql_customer_res['username'];
    };
?>
<body>
    <?php require "adminlayout.php" ?>
    <!-- <div class="container-fluid"> -->
        <div class="row">
            <div class="col-md-2">
                <?php require "adminsidebar.php" ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <h2>Orders</h2><hr>
                <table class="table table-striped">
                    <tr>
                        <th>Book</th>
                        <th>Customer</th>
                        <th>Amount</th>
                    </tr>
                    <?php 
                        
                        foreach($results as $row) {
                            echo "
                            <tr>
                                <td>" . bookTitle($row['book_id']) . "</td>
                                <td>" . customerName($row['customer_id']) . "</td>
                                <td>$row[amount]</td>
                            </tr>
                            ";
                        }
                    ?>
                </table>
            </div>
        </div>
    <!-- </div> -->
</body>
</html>