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
$imagename = "";
$hint_array = $author_array = $price_array = $imagename_array = array();

if($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    
    foreach($books as $name) {
        if(stristr($q, substr($name['title'], 0, $len)) && $name['sold'] == 0) {
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

            if($imagename === "") {
                $imagename_array[count($imagename_array)] = $name['imagename'];
            } else {
                $imagename_array[count($imagename_array)] = $name[imagename];
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
        <div class='col-md-3 single-post'>
        <div class='img-div'>
            <img src='assets/book_covers/". $imagename_array[$i] ."' alt='img not found' height='300px' width='250px'>
        </div>
        <div class='post-text'>
            <h4>$hint_array[$i]</h4>
            <p>- $author_array[$i]</p>
            <h4 style=''>$ $price_array[$i]</h4>
            </div>
        </div>
        ";
    }
}
?>