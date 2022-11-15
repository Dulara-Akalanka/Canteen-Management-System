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

$query ="INSERT INTO employee (emp_id,emp_name,	emp_address,emp_phone_no,emp_email,d_o_a,d_o_t,salary,supervisor_id)
 VALUES ('$emp_id','$emp_name','$emp_address','$emp_phone_no','$emp_email','$d_o_a','$d_o_t','$salary','$supervisor_id')";

$query_run = mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['message']="EMPLOYEE INSERTED SUCCESSFULLY";
 header("Location: employee.php");
 exit(0);
}
else{
    $_SESSION['message']="EMPLOYEE NOT INSERTED SUCCESSFULLY";
 header("Location: employee.php");
 exit(0);
}
}
?>