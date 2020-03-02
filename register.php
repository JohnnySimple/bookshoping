<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Page</title>
</head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery1.js"></script>

<style>
    .register-form-div {
        margin-top:200px;
        
    }
    .form {
        width:30%;
        padding:10px;
        box-shadow: 0 0 10px #ccc;
        border-radius:20px;
    }
    .form input {
        margin:10px 0px 10px 0px;
    }
</style>

<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookshop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die ("connection failed: " . $conn->connect_error);
    }
    

    // $name = $_POST["username"];
    // $email = $_POST["email"];
    // $pass = $_POST["password"];
    // $confirm_pass = $_POST["confirm_password"];

    $nameErr = $emailErr = $passwordErr = $confirm_passwordErr = $firstnameErr = $lastnameErr = "";

    if(isset($_POST["submit"])){

        if(empty($_POST["username"])) {
            $nameErr = "Name is required!";
        } else {
            $name = test_input($_POST["username"]);
        }

        if(empty($_POST["firstname"])) {
            $firstnameErr = "Firstname is required!";
        } else {
            $firstname = test_input($_POST["firstname"]);
        }

        if(empty($_POST["lastname"])) {
            $lastnameErr = "Lastname is required!";
        } else {
            $lastname = test_input($_POST["lastname"]);
        }

        if(empty($_POST["email"])) {
            $emailErr = "Email is required!";
        } else {
            $email = test_input($_POST["email"]);
        }

        if(empty($_POST["password"])) {
            $passwordErr = "Password is required!";
        } else {
            $pass = test_input($_POST["password"]);
        }

        if(empty($_POST["confirm_password"])) {
            $confirm_passwordErr = "Confirm password is required!";
        } elseif($_POST["confirm_password"] !== $pass) {
            $confirm_passwordErr = "Your password is not matching!";
        } else {
            $confirm_pass = test_input($_POST["confirm_password"]);
            
            $sql = "INSERT INTO Users (firstname, lastname, username, email, password)
            VALUES('$firstname', '$lastname', '$name', '$email', '$pass')";
    
            if($conn->query($sql)) {
                echo "<div class='alert alert-success' style='width:30%' align='center'>
                Account created successfully!!
                </div>";
            } else {
                echo "Unable to create account:" . $conn->error;
            }
        }
        
       

        
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
<body>
<?php require "homenavbar.php" ?>
    <div class="container cont1" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
    url('imgs/library1.jpeg');height:700px;position:absolute;top:-50px;z-index:-1;width:100%">
        <div class="register-form-div" align="center">
            <div class="form">
            <h2 style="color:#fff">Register Here!</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-group">
                    <input type="text" name="firstname" class="form-control" placeholder="Firstname" required="">
                    <span class="error" style="color:#fff;"><?php echo $firstnameErr; ?></span>
                    <input type="text" name="lastname" class="form-control" placeholder="Lastname" required="">
                    <span class="error" style="color:#fff;"><?php echo $lastnameErr; ?></span>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                    <span class="error" style="color:#fff;"><?php echo $nameErr; ?></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    <span class="error" style="color:#fff;"><?php echo $emailErr; ?></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    <span class="error" style="color:#fff;"><?php echo $passwordErr; ?></span>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required="">
                    <span class="error" style="color:#fff;"><?php echo $confirm_passwordErr; ?></span>
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