<?php
// create connection
$conn = new mysqli("localhost", "root", "", "restaurant");

//check connection
if(!$conn){
    die ('Connection Failure'.mysqli_connect_error());
}

?>