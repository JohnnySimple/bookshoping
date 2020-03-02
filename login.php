<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery1.js"></script>

<style>
    .form-div {
        margin-top:200px;
    }
    .form {
        width:20%;
        padding: 10px;
        box-shadow:0 0 10px #fff;
        border-radius: 20px;
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

        if($count == 0) {
            echo "<div class='container alert alert-danger' align='center' style='width:30%'>
                    Username or password incorrect!
                </div>";
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
<div class="container-fluid cont1" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
    url('imgs/library1.jpeg');height:700px;position:absolute;top:-50px;z-index:-1;width:100%">
    <div align="center" class="form-div">
        
        <div class="form">
        <h2 style="color:#fff">Login Here!</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <span class="error"><?php echo $nameErr; ?></span>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="error"><?php echo $passwordErr; ?></span>
                <input type="submit" name="submit" class="btn btn-primary" value="Submit"> 
            </form>
        </div>
    </div>
</div>
<script>
if(window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
</body>
</html>