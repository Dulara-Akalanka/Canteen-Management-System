<?php
require'../../include/dbcon.php';

session_start();
if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
include_once('../../include/header.php');
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>ITEM</title>
</head>
  <body>

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
    <h4> ITEM Details
    <a href="../../admin_home/index.php" class="btn btn-danger float-end" >BACK</a>
    <a href="item.php" class="btn btn-primary float-end">ADD AN ITEM</a>
</h4>
</div>
<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ITEM_ID</th>
                <th>ITEM_NAME</th>
                <th>BRAND</th>
                <th>QUANTITY</th>
                <th>UNIT_PRICE</th>
                <th>D-O-M</th>
                <th>D-O-E</th>
                <th>EMPLOYEE_ID</th>
                <th>SUPPLIER_ID</th>
                <th>ACTION</th>
</tr>
</thead>
<tbody>
    <?php
    $query = "SELECT * FROM item";
    $query_run = mysqli_query($conn,$query);
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $item)
{
?>
<tr>
    <td><?=$item['item_id'];?></td>
    <td><?=$item['item_name'];?></td>
    <td><?=$item['brand'];?></td>
    <td><?=$item['quantity'];?></td>
    <td><?=$item['unit_price'];?></td>
    <td><?=$item['d_o_m'];?></td>
    <td><?=$item['d_o_e'];?></td>
    <td><?=$item['emp_id'];?></td>
    <td><?=$item['supplier_id'];?></td>
    <td>
        
    <form action="update.php" method ="post">
      <input type="hidden" name="id" value="<?=$item['item_id']; ?>">    
      <input type="submit" value="UPDATE" name="edit" class="btn btn-success btn-sm">
    </form> 

    <form action="delete.php" method ="post">
      <input type="hidden" name="id" value="<?=$item['item_id']; ?>">     
      <input type="submit"  value="DELETE" name="delete" class="btn btn-danger btn-sm">
    </form> 
</td>
</tr>
<?php
}
 }
    else{
       echo"<h5> No Record Found </h5>";
    }
  ?>
  </tbody> 
</table>
</div>
</div>
</div>
</div>
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>