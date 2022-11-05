<?php
// create connection
$conn = new mysqli("localhost", "root", "", "restaurant");

//check connection
if($conn -> connect_error){
    die ("Connection Failure: " . $conn -> connect_error);
}

?>