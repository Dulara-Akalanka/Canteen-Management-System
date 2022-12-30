<?php 
   include("db.php");

   $sql = "SELECT `unit_price` FROM `item` where `item_name`='".$_POST['id']."'";
   $query = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_assoc($query))
   {
         $data = $row;
   }
    echo  array_values($data)[0]    ;


 ?>



