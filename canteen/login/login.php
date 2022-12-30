<?php

session_start();

if(isset($_POST["submit"])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once('conn.php');

    $query="SELECT * FROM emp_role WHERE username='$username' && password ='$password'";

    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_array($result);
    $_SESSION['username']=$username;

    if($row["user_type"] == "admin"){
        header ("Location: ../admin/admin_home/index.php");
    }
    elseif($row["user_type"] == "cashier"){
        header ("Location: ../invoice/create_invoice.php");
    }
    else{
        
        echo "<script>alert('Invalid Username and Password')</script>";
       // $_SESSION['message']="INVALID USERNAME AND PASSWORD";
        header ("Location: index.php");
        
    }
}