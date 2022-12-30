<?php
require'../../include/dbcon.php';
session_start();
if(!isset($_SESSION['username'])) {
    header("Location:index.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>SUPPLIER</title>
    <style>
      body {
  margin: 0px 0px 0px 0px;
  font-family: Arial, Helvetica, sans-serif;
  background-color: #FFF6BD;
}
.row{
  margin-top:10px;
}

    </style>
</head>
  <body>
  <?php include_once('../../include/header.php'); ?>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
    <h4> SUPPLIER Details
    <a href="../admin_home/index.php" class="btn btn-danger float-end" >BACK</a>
    <a href="supplier.php" class="btn btn-primary float-end">ADD A SUPPLIER</a>
</h4>
</div>
<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Supplier_ID</th>
                <th>Supplier_Name</th>
                <th>Supplier_Address</th>
                <th>Supplier_Phone_No</th>
                <th>Supply_Date</th>
                <th>SUPPLIER_PAYMENT</th>                
              </tr>
          </thead>
<tbody>
    <?php
    $query = "SELECT * FROM supplier";
    $query_run = mysqli_query($conn,$query);
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $supplier)
{
?>
<tr>
    <td><?=$supplier['sup_id'];?></td>
    <td><?=$supplier['sup_name'];?></td>
    <td><?=$supplier['sup_address'];?></td>
    <td><?=$supplier['sup_phone_no'];?></td>
    <td><?=$supplier['supply_date'];?></td>
    <td><?=$supplier['sup_payment'];?></td>
    <td>
        <form action="update.php" method="post">
        <input type="hidden" name = "id" value="<?=$supplier['sup_id'];?>">
        <input type="submit" value="UPDATE" name="edit" class="btn btn-success btn-sm">
        </form>

        <form action="delete.php" method ="post">
      <input type="hidden" name="id" value="<?=$supplier['sup_id'];?>">     
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

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
