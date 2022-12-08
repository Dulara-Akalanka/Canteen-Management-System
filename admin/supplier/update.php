<?php
session_start();
require'../../include/dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Supplier Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <?php
    if(isset($_POST['id'])){
      
    $supplier_id= mysqli_real_escape_string($conn, $_POST['id']);  
    $query ="SELECT * FROM supplier WHERE sup_id='$supplier_id '";
    $query_run = mysqli_query($conn,$query);

   if($query_run){
    while($row=mysqli_fetch_array($query_run)){
   
  ?>
   <div class="container mb-9">

<?php include('message.php');?>

<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
    <h4> SUPPLIER UPDATE
    <a href="index.php" class="btn btn-danger float-end">BACK</a>
</h4>
</div>
<div class="card-body">
<form action="" method="POST">
<input type="hidden" name="id" value="<?php echo $row['sup_id'] ?>">

    <div class="mb-3">
    <label>Supplier_ID</label>
    <input type="text" name="ID" value="<?php echo $row['sup_id'] ?>" class="form-control">
    </div>
    <div class="mb-3">
    <label> Supplier_Name</label>
    <input type="text" name="name" value="<?php echo $row['sup_name'] ?>" class="form-control">
    </div>
    <div class="mb-3">
    <label>Supplier_Address</label>
    <input type="text" name="address" value="<?php echo $row['sup_address'] ?>" class="form-control">
    </div>
    <div class="mb-3">
    <label>Supplier_Phone_No</label>
    <input type="text" name="phone" value="<?php echo $row['sup_phone_no'] ?>" class="form-control">
    </div>
    <div class="mb-3">
    <label>Supply_Date</label>
    <input type="date" name="phone" value="<?php echo $row['supply_date'] ?>" class="form-control">
    </div>
    <div class="mb-3">
    <label>SUPPLIER_PAYMENT</label>
    <input type="text" name="payment" value="<?php echo $row['sup_payment'] ?>" class="form-control">
    </div>

    <div class="mb-3">
    <button type="SUBMIT" name="update" class="btn btn-primary">Update Supplier</button>
    </div>
    
</form>

<?php
  if(isset($_POST['update'])){
    $sup_id = $_POST['ID'];
    $sup_name = $_POST['name'];
    $sup_address = $_POST['address'];
    $sup_phone = $_POST['phone'];
    $sup_date = $_POST['phone'];
    $sup_payment = $_POST['payment'];

    $query = "UPDATE supplier SET sup_id='$sup_id',sup_name='$sup_name',sup_address='$sup_address',sup_phone_no='$sup_phone',supply_date='$sup_date',sup_payment='$sup_payment'
    WHERE sup_id='$sup_id'";

$query_run = mysqli_query($conn,$query);
if($query_run){
  $_SESSION['message']="SUPPLIER UPDATED SUCCESSFULLY";
  header("Location: index.php");
  exit(0);
}
else{
  $_SESSION['message']="SUPPLIER NOT UPDATED SUCCESSFULLY";
  header("Location: index.php");
  exit(0);
}
}
?>
<?php
}
}
else
{
echo '<script> alert("NO RECODS FOUND");</script>';
}
}
?>
</div>
</div>
</div>
</div>
</div>

</body>
</html>
