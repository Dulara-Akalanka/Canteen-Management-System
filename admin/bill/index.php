<?php
require'../../include/dbcon.php';

session_start();
if(!isset($_SESSION['username'])) {
    header("Location:index.php");
}
include_once('../../include/header.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Invoice Details</title>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
    <h4> Invoice Details
    <a href="../../admin_home/index.php" class="btn btn-danger float-end">BACK</a>
    <!-- <a href="employee.php" class="btn btn-danger float-end">ADD AN EMPLOYEE</a></h4> -->
</div>
<div class="card-body">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Invoice Id</th>
        <th>Customer Name</th> 
        <th>Sub Total</th>
        <th>Tax</th>
        <th>Grand Total</th>
      </tr>
    </thead>
<tbody>
  <?php
    $query = "SELECT * FROM invoice";
    $query_run = mysqli_query($conn,$query);
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $invoice){
?>
<tr>
  <td><?=$invoice['invoice_id'];?></td> 
  <td><?=$invoice['customer_name'];?></td>
  <td><?=$invoice['order_total_before_tax'];?></td>
  <td><?=$invoice['order_total_tax'];?></td>
  <td><?=$invoice['order_total_after_tax'];?></td>

</tr>
<?php
    }
  }
  else{
    echo"<h5> No Records Found </h5>";
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