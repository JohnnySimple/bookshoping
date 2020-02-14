<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE Orders(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id INT(10) UNSIGNED NOT NULL,
    book_id INT(10) UNSIGNED NOT NULL,
    amount FLOAT,
    FOREIGN KEY(customer_id) REFERENCES Users(id),
    FOREIGN KEY(book_id) REFERENCES Books(id)
)";

// $sql = "ALTER TABLE Users
//     ADD admin BOOLEAN DEFAULT false
// ";

// $sql = "INSERT INTO Users(username, email, password, admin)
// VALUES('admin', 'admin@gmail.com', 'password', 1)";

if($conn->query($sql) === TRUE) {
    echo "Table 'Orders' created successfully!";
} else {
    echo "Lela, error apai!" . $conn->error;
}

?>