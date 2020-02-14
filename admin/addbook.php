<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>

<style>
    .form input {
        margin:10px 0px 10px 0px;
    }
</style>

<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "bookshop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }

    $titleErr = $authorErr = $priceErr = "";
    $title = $author = $price = "";

    if(isset($_POST["submit"])) {
        if(empty($_POST["title"])) {
            $titleErr = "Title is required";
        } else {
            $title = $_POST["title"];
        }

        if(empty($_POST["author"])) {
            $authorErr = "Author is required";
        } else {
            $author = $_POST["author"];
        }
        
        // if(empty($_POST["price"])) {
        //     $price = 0.00;
        // }
        $price = $_POST["price"];

        $sql = "INSERT INTO Books(title, author, price)
        VALUES('$title', '$author', '$price')";

        if($conn->query($sql) == true) {
            echo "Book '$title' added successfully!";
        } else {
            echo "Lela awu! " . $conn->error;
        }
    }
?>

<body>

<?php require "adminlayout.php" ?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-2">
        <?php require "adminsidebar.php" ?>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-5">
        <div class="form">
            <h2>Add Book</h2>
            <form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" name="title" class="form-control" placeholder="book title">
                <span class="error"><?php echo $titleErr ?></span>
                <input type="text" name="author" class="form-control" placeholder="author">
                <span class="error"><?php echo $authorErr ?></span>
                <input type="text" name="price" class="form-control" placeholder="price">
                <button class="btn btn-primary" name="submit">Add</button>
            </form>
        </div>
    </div>
</div>
</div>    
</body>
</html>