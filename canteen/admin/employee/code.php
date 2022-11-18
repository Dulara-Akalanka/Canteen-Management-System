<?php
session_start();
require 'dbcon.php';

if(isset($_POST['SUBMIT']))
{
 $emp_id = mysqli_real_escape_string($conn, $_POST['ID']);
 $emp_name = mysqli_real_escape_string($conn, $_POST['name']);
 $emp_address = mysqli_real_escape_string($conn, $_POST['address']);
 $emp_phone_no = mysqli_real_escape_string($conn, $_POST['phone']);
 $emp_email = mysqli_real_escape_string($conn, $_POST['email']);
 $d_o_a = mysqli_real_escape_string($conn, $_POST['date-a']);
 $d_o_t = mysqli_real_escape_string($conn, $_POST['date-t']);
 $salary = mysqli_real_escape_string($conn, $_POST['s_name']);
 $supervisor_id = mysqli_real_escape_string($conn, $_POST['s_id']);

 $username = mysqli_real_escape_string($conn, $_POST['username']);
 $password = mysqli_real_escape_string($conn, $_POST['password']);
 $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);


$query1 ="INSERT INTO employee (emp_id,emp_name,emp_address,emp_phone_no,emp_email,d_o_a,d_o_t,salary)
 VALUES ('$emp_id','$emp_name','$emp_address','$emp_phone_no','$emp_email','$d_o_a','$d_o_t','$salary')";

$query_run1 = mysqli_query($conn,$query1);

if($user_type != "none"){
    $query2 ="INSERT INTO emp_role (username, password, user_type, emp_id) VALUES ('$username','$password','$user_type','$emp_id')";

    $query_run2 = mysqli_query($conn,$query2);
}

if($query_run1 )
{
    $_SESSION['message']="EMPLOYEE INSERTED SUCCESSFULLY";
 header("Location: index.php");
 exit(0);
}
else{
    $_SESSION['message']="EMPLOYEE NOT INSERTED SUCCESSFULLY";
 header("Location: employee.php");
 exit(0);
}
}
?>
