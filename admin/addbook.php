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

    $titleErr = $authorErr = $priceErr = $descriptionErr = "";
    $title = $author = $price = $description = "";

    

    if(isset($_POST["submit"])) {
        $target_dir = "../assets/book_covers/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

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

        if(empty($_POST["description"])) {
            $descriptionErr = "Description is required";
        } else {
            $description = $_POST["description"];
        }
        
        // if(empty($_POST["price"])) {
        //     $price = 0.00;
        // }
        $price = $_POST["price"];

        // check if image file is a real image or not
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false){
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // check if file already exists
        if(file_exists($target_file)){
            echo "Sorry, file already exist!";
            $uploadOk = 0;
        }

        // check file size
        if(filesize($_FILES["fileToUpload"]["size"] > 5000000)){
            echo "Sorry, your file is too large!";
            $uploadOk = 0;
        }

        // allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"){
                echo "Sorry, only JPG, JPEG, PNG & GIF are allowed!";
                $uploadOk = 0;
        }

        // check if uplaodOk is set to 0 by an error
        if($uploadOk == 0){
            echo "Sorry, your file was not uploaded!";
            // try to upload the file if everything is ok
        } else {
            if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded!";
            } else {
                echo "Sorry, there was an error uploading your file!";
            }
        }

        $imgName = $_FILES["fileToUpload"]["name"]."\n";


        $sql = "INSERT INTO Books(title, author, description, price, imagename)
        VALUES('$title', '$author', '$description', '$price', '$imgName')";

        if($conn->query($sql) == true) {
            echo "Book '$title' added successfully!";
        } else {
            echo "Unable to add book: " . $conn->error;
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
            <form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <input type="text" name="title" class="form-control" placeholder="book title" required="">
                <span class="error"><?php echo $titleErr ?></span>
                <input type="text" name="author" class="form-control" placeholder="author" required="">
                <span class="error"><?php echo $authorErr ?></span>
                <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="description" required=""></textarea>
                <span class="error"><?php echo $descriptionErr ?></span>
                <input type="text" name="price" class="form-control" placeholder="price">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <button class="btn btn-primary" name="submit">Add</button>
            </form>
        </div>
    </div>
</div>
</div>    
</body>
</html>