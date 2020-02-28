<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1 = 
    "CREATE TABLE Users(
        id Int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(30),
        password VARCHAR(60) NOT NULL,
        admin BOOLEAN DEFAULT FALSE,
        reg_date TIMESTAMP
    )";

    $sql2 = 
        " CREATE TABLE Books(
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(60) NOT NULL,
            author VARCHAR(60) NOT NULL,
            description MEDIUMTEXT NOT NULL,
            sold BOOLEAN DEFAULT FALSE,
            price FLOAT,
            imagename VARCHAR(60),
            copies INT(10) UNSIGNED
        )";

    $sql3 = 
        "CREATE TABLE Orders(
            id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            customer_id INT(10) UNSIGNED NOT NULL,
            book_id INT(10) UNSIGNED NOT NULL,
            copies INT(10) UNSIGNED,
            amount FLOAT,
            FOREIGN KEY(customer_id) REFERENCES Users(id),
            FOREIGN KEY(book_id) REFERENCES Books(id)
        )";
    
    $sql4 = "INSERT INTO Users(firstname, lastname, username, email, password, admin)
            VALUES('Johnson', 'Obeng', 'johnnysimple', 'obengboatengjohnson@gmail.com', 'adminpassword', 1)";



if($conn->query($sql1) && $conn->query($sql2) && $conn->query($sql3) && $conn->query($sql4) === TRUE) {
    echo "Tables created successfully!";
} else {
    echo "Error creating tables:" . $conn->error;
}

?>