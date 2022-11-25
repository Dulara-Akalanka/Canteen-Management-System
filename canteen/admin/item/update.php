<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITEM Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <?php
    if(isset($_POST['id'])){
      
    $product_id= mysqli_real_escape_string($conn, $_POST['id']);  
    $query ="SELECT * FROM item WHERE item_id='$product_id '";
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
        <h4> ITEM UPDATE
        <a href="index.php" class="btn btn-danger float-end">BACK</a>
</h4>
</div>
<div class="card-body">
    <form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['item_id'] ?>">
        <div class="mb-3">
        <label> ITEM_ID</label>
        <input type="text" name="ID" value="<?php echo $row['item_id'] ?>" class="form-control">
        </div>
        <div class="mb-3">
        <label> ITEM_NAME</label>
        <input type="text" name="name" value="<?php echo $row['item_name'] ?>" class="form-control">
        </div>
        <div class="mb-3">
        <label> BRAND</label>
        <input type="text" name="brand" value="<?php echo $row['brand'] ?>" class="form-control">
        </div>
        <div class="mb-3">
        <label> QUANTITY</label>
        <input type="text" name="quantity" value="<?php echo $row['quantity'] ?>" class="form-control">
        </div>
        <div class="mb-3">
        <label>UNIT_PRICE</label>
        <input type="text" name="price" value="<?php echo $row['unit_price'] ?>" class="form-control">
        </div>
        <div class="mb-3">
        <label>D-O-M</label>
        <input type="date" name="date-m" value="<?php echo $row['d_o_m'] ?>" class="form-control">
        </div>
        <div class="mb-3">
        <label> D-O-E</label>
        <input type="date" name="date-e" value="<?php echo $row['d_o_e'] ?>" class="form-control">
        </div>
        <div class="mb-3">
        <label>EMPLOYEE_ID</label>
        <input type="text" name="employee_id" value="<?php echo $row['emp_id'] ?>" class="form-control">
        </div>
        <div class="mb-3">
        <label>SUPPLIER_ID</label>
        <input type="text" name="supplier_id" value="<?php echo $row['supplier_id'] ?>" class="form-control">
        </div>

        <div class="mb-3">
        <button type="SUBMIT" name="update" class="btn btn-primary">UPDATE ITEM</button>
        </div>
        
</form>

<?php
  if(isset($_POST['update'])){
  
    $item_id = $_POST['ID'];
    $item_name =  $_POST['name'];
    $brand = $_POST['brand'];
    $quantity =  $_POST['quantity'];
    $unit_price =  $_POST['price'];
    $d_o_m =  $_POST['date-m'];
    $d_o_e = $_POST['date-e'];
    $emp_id =  $_POST['employee_id'];
    $supplier_id =  $_POST['supplier_id'];
   
    $query ="UPDATE employee SET  item_id='$item_id',item_name='$item_name',brand='$brand',quantity='$quantity',unit_price='$unit_price',d_o_m='$d_o_m',d_o_e='$d_o_e',emp_id='$emp_id',
    supplier_id='$supplier_id' WHERE item_id='$id'";

    $query_run = mysqli_query($conn,$query);
    if($query_run){
      $_SESSION['message']="ITEM UPDATED SUCCESSFULLY";
      header("Location: index.php");
      exit(0);
    }
    else{
      $_SESSION['message']="ITEM NOT UPDATED SUCCESSFULLY";
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