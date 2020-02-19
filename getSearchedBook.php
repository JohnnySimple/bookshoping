<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookshop";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM Books";
$books = $conn->query($sql);


// get parameter q from the url
$q = $_REQUEST['q'];

$hint = "";
$author = "";
$price = "";
$hint_array = $author_array = $price_array = array();

if($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    
    foreach($books as $name) {
        if(stristr($q, substr($name['title'], 0, $len))) {
            if($hint === "") {
                $hint_array[count($hint_array)] = $name['title'];
            } else {
                $hint_array[count($hint_array)] = $name['title'];
            }

            if($author === "") {
                $author_array[count($author_array)] = $name['author'];
            }
             else {
                $author_array[count($author_array)] = $name[author];
            }

            if($price === "") {
                $price_array[count($price_array)] = $name['price'];
            } else {
                $price_array[count($price_array)] = $name[price];
            }
        }
    }
}

// output no suggestion if no hint was found or output correct values
// echo $hint === "" ? "no suggestion: press ENTER to refresh!" : 
// "<tr>
//     <td>$hint</td>
//     <td>$author</td>
//     <td>$price</td
// </tr>";
if(count($hint_array) == 0) {
    echo "no suggestion: press ENTER to refresh";
} else {
    for($i=0; $i<count($hint_array); $i++) {
        echo "
            <tr>
                <td>$hint_array[$i]</td>
                <td>$author_array[$i]</td>
                <td>$price_array[$i]</td>
            </tr>
        ";
    }
}
?>