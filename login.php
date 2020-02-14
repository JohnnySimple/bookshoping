<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery1.js"></script>

<style>
    .cont1 {
        margin-top:200px;
    }
    .form {
        width:30%;
    }
    .form input {
        margin:10px 0px 10px 0px;
    }
</style>

<?php
    session_start();

    // checking if user is already logged in 
    // if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    //     header("location: homepage.php");
    //     exit;
    // }

    $nameErr = $passwordErr = "";
    $name = $pass = "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookshop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    }

    if(isset($_POST["submit"])) {
        if(empty($_POST["username"])){
            $nameErr = "Username is required!";
        } else {
            $name = $_POST["username"];
        }
        if(empty($_POST["password"])){
            $passwordErr = "Password is required";
        } else {
            $pass = $_POST["password"];
        }
        
        // $sql_username = "SELECT * FROM Users WHERE username='$name'";
        // $sql_password = "SELECT * FROM Users WHERE password='$pass'";
        // $results_username = $conn->query($sql_username);
        // $results_password = $conn->query($sql_password);

        $sql = "SELECT * FROM Users WHERE username='$name' AND password='$pass'";
        $results = $conn->query($sql);
        $count = mysqli_num_rows($results);
        echo "$count";

        if($count == 0) {
            echo "<span>Please sign up first.</span>";
        } else {
            $ad = "SELECT * FROM Users WHERE username='$name'";
            $ad_res = $conn->query($ad);
            $converted_ad = $ad_res ? 'true' : 'false';
            $loggedin_user = mysqli_fetch_assoc($ad_res);
            if($loggedin_user['admin'] == 1) {
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $name;
                // redirect to homepage
                header("location: admin/adminpage.php");
            } else {
                 // echo "<span>You are logged in.</span>";
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $name;
                // redirect to homepage
                header("location: homepage.php");
            }
           
        }

        // while($row = $results->fetch_assoc()){
        //     if($name == $row['username'] && $pass == $row['password']) {
        //         echo "<span>You are logged in!</span>";
        //     } else {
        //         echo "<span>Please sign up first.</span>";
        //     }
        // }

        // foreach($results->fetch_assoc() as $row) {
        //     // if($name === $row["username"] && $pass === $row["password"]){
        //     //     echo "<h1>You are logged in!</h1>";
        //     // } else {
        //     //     echo "<h1>Please sign up first!</h1>";
        //     // }
        //     echo $row['username'];
        // }
    }

?>

<body>
<?php require "homenavbar.php" ?>
<div class="container cont1">
        <h3>Login Here!</h3>
        <div class="form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <span class="error"><?php echo $nameErr; ?></span>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="error"><?php echo $passwordErr; ?></span>
                <input type="submit" name="submit" value="Submit"> 
            </form>
        </div>
    </div>
</body>
</html>