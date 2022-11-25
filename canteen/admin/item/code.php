<?php
session_start();
require 'dbcon.php';

if(isset($_POST['SUBMIT']))
{
 $item_id = mysqli_real_escape_string($conn, $_POST['ID']);
 $item_name = mysqli_real_escape_string($conn, $_POST['name']);
 $brand = mysqli_real_escape_string($conn, $_POST['brand']);
 $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
 $unit_price = mysqli_real_escape_string($conn, $_POST['price']);
 $d_o_m = mysqli_real_escape_string($conn, $_POST['date-m']);
 $d_o_e = mysqli_real_escape_string($conn, $_POST['date-e']);
 $emp_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
 $supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);

$query ="INSERT INTO item (item_id,item_name,brand,quantity,unit_price,d_o_m,d_o_e,emp_id,supplier_id)
 VALUES ('$item_id','$item_name','$brand','$quantity','$unit_price','$d_o_m','$d_o_e','$emp_id','$supplier_id')";

$query_run = mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['message']="ITEM INSERTED SUCCESSFULLY";
        header("Location: index.php");
        exit(0);
}
else{
    $_SESSION['message']="ITEM NOT INSERTED SUCCESSFULLY";
        header("Location: index.php");
        exit(0);
}
}
?>