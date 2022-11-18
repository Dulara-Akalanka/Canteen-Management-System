<?php 
    $conn = mysqli_connect("localhost", "root", "", "restaurant");

    //check connection
    if(mysqli_connect_error()){
        echo "Failed to connect to MySQL : ".mysqli_connect_error();
    }
 ?>