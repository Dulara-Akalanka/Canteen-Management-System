<?php

require_once('conn.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn,"SELECT username , password FROM role WHERE username ='$username' AND password = ' $password'");

    if($row = mysqli_fetch_array($sql)){
        if($password == $row['password']){
           header("location:index.html");
           //echo "Success Username/password";
            exit();
        }
        else{
            echo "Invalid Username/password";
        }
            
    }



//isset <- variable thiyenawada kiyana eka ( $_POST )
?>
