<?php
session_start();
require 'dbcon.php';

if(isset($_POST['SUBMIT']))
{
 $name = mysqli_real_escape_string($con, $_POST['ID']);
 $name = mysqli_real_escape_string($con, $_POST['name']);
 $name = mysqli_real_escape_string($con, $_POST['address']);
 $name = mysqli_real_escape_string($con, $_POST['phone']);
 $name = mysqli_real_escape_string($con, $_POST['email']);
 $name = mysqli_real_escape_string($con, $_POST['date-a']);
 $name = mysqli_real_escape_string($con, $_POST['date-t']);
 $name = mysqli_real_escape_string($con, $_POST['s_name']);
 $name = mysqli_real_escape_string($con, $_POST['s_id']);

$query ="INSERT INTO 
employee (emp_id	,emp_name,	emp_address,emp_phone_no,emp_email,d_o_a,d_o_t,salary,supervisor_id)
 VALUES ('$emp_id,$emp_name,$emp_address,$emp_phone_no,$emp_email,$d_o_a,$d_o_t,$salary,$supervisor_id)";

$query_run = mysqli_query($con,$query);
if($query_run)
{
    $_SESSION['message']="Employee Created Successfully";
 header("Location: employee.php");
 exit(0);
}
else{
    $_SESSION['message']="Employee Not Created Successfully";
 header("Location: employee.php");
 exit(0);
}
}
?>