<!DOCTYPE html>
<html>
<head>
    <title>Delete book</title>
</head>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookshop";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error) {
        die("connection failed:" . $conn->connect_error);
    }

    $sql = "SELECT * FROM Books";
    $results = $conn->query($sql);
    if($results != true) {
        echo "Unable to query Books table" . $conn->error;
    }

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
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Delete</th>
                    </tr>
                    <?php 
                        if(isset($_POST["delete"])) {
                            $book_id = $_POST["book_id"];
                            $sql_delete = "DELETE FROM Books WHERE id='$book_id'";
                            $conn->query($sql_delete);
                        }
                        foreach($results as $row) {
                            echo "
                                <tr>
                                    <td>$row[title]</td>
                                    <td>$row[author]</td>
                                    <td>
                                    <form method='post'>
                                    <button class='btn btn-danger' name='delete'>
                                    <span class='glyphicon glyphicon-trash'
                                     style=''></span>
                                     </button>
                                        <input type='hidden' name='book_id' value='$row[id]'/>
                                            
                                    </form>
                                    </td>
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