<?php
session_start();
require 'conn.php';

if(isset($_POST['SUBMIT']))
{
 $sup_ID = mysqli_real_escape_string($conn, $_POST['ID']);
 $sup_name = mysqli_real_escape_string($conn, $_POST['name']);
 $sup_address = mysqli_real_escape_string($conn, $_POST['address']);
 $phone = mysqli_real_escape_string($conn, $_POST['phone']);
 $date = mysqli_real_escape_string($conn, $_POST['date']);
 $payment = mysqli_real_escape_string($conn, $_POST['payment']);
 

$query ="INSERT INTO supplier (sup_id,sup_name,sup_address,sup_phone_no,supply_date,sup_payment)
 VALUES ('$sup_ID','$sup_name','$sup_address','$phone','$date','$payment')";

$query_run = mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['message']="SUPPLIER INSERTED SUCCESSFULLY";
 header("Location: supplier.php");
 exit(0);
}
else{
    $_SESSION['message']="SUPPLIER NOT INSERTED SUCCESSFULLY";
 header("Location: supplier.php");
 exit(0);
}
}
?>
