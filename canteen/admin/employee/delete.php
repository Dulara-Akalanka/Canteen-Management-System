<?php
require'../../include/dbcon.php';
if(isset($_POST['delete'])){
    $id=$_POST['id'];

    $sql="update employee set deleted =1  where emp_id='$id'";
    $query_run=mysqli_query($conn,$sql);

    if($query_run)
{
    echo "Deleted Successfully";
    header("location:index.php");
}     
else{
    echo " Not Deleted Successfully";
}   
    
}