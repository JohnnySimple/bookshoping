<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
    <script>
        function showHint(str){
            if(str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET", "getSearchedBook.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
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
.single-post {
    height:450px;
}
.img-div {
    
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
        echo "Unable to query from table Books" . $conn->error;
    }

?>
<body>
    <?php require "homenavbar.php" ?>
    <div class="col-md-6"></div>
    <div class="col-md-3">
        <form action="">
            <input type="text" class="form-control" placeholder="search books" onkeyup="showHint(this.value)">
        </form>
        </div>
    <div align="right" class="col-md-3" style="font-size:20px">
    </div>
    <div class="container" style="margin-top:60px;">
    <!-- <p>Suggestions: <span id="txtHint"></span></p> -->
    <h3>Available Books</h3><hr width="30%" style="margin-left:-30px">
    <!--  -->
    <div class="container" id='txtHint'>
        <div class="row" >
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
                        $amt = $row['price'];
                    }

                    if($row['sold'] == 0){
                        echo "
                        <div class='col-md-3 single-post'>
                            <div class='img-div'>
                                <img src='assets/book_covers/". $row['imagename'] . "' alt='img not found' height='300px' width='250px'>
                            </div>
                            <div class='post-text'>
                                <h4>$row[title]</h4>
                                <p>- $row[author]</p>
                                <h4 style=''>$ $row[price]</h4>
                            </div>
                        </div>
                        ";
                    }
                    
                }
    ?>
        </div>
    </div>
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-3 single-post">
                <div class="img-div">
                    <img src="imgs/book_cover.jpeg" alt="img not found" height="300px">
                </div>
                <div class="post-text">
                    <p>Harry Potter</p>
                    $70.00
                </div>
            </div>
        </div>
    </div> -->
</body>

</html>