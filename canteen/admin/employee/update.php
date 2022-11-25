<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <?php
    if(isset($_POST['id'])){
      
    $employee_id= mysqli_real_escape_string($conn, $_POST['id']);  
    $query ="SELECT * FROM employee WHERE emp_id='$employee_id '";
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
    <h4> EMPLOYEE UPDATE
    <a href="index.php" class="btn btn-danger float-end">BACK</a></h4>
  </div>
  <div class="card-body">
    <form action="" method="POST">
      <input type="hidden" name="id" value="<?php echo $row['emp_id'] ?>">
     
      <div class="mb-3">
      <label> EMPLOYEE_ID</label>
      <input type="text" name="ID" value="<?php echo $row['emp_id'];?>" class="form-control">
      </div>
      <div class="mb-3">
      <label> EMPLOYEE_NAME</label>
      <input type="text" name="name" value="<?php echo $row['emp_name'];?>" class="form-control">
      </div>
      <div class="mb-3">
      <label> EMPLOYEE_ADDRESS</label>
      <input type="text" name="address" value="<?php echo $row['emp_address'];?>" class="form-control">
      </div>
      <div class="mb-3">
      <label> EMPLOYEE_PHONE_NO</label>
      <input type="text" name="phone" value="<?php echo $row['emp_phone_no'];?>" class="form-control">
      <div class="mb-3">
      <label>EMPLOYEE_EMAIL</label>
      <input type="email" name="email" value="<?php echo $row['emp_email'];?>" class="form-control">
      </div>
      <div class="mb-3">
      <label>D-O-A</label>
      <input type="date" name="date-a" value="<?php echo $row['d_o_a'];?>"class="form-control">
      </div>
      <div class="mb-3">
      <label> D-O-T</label>
      <input type="date" name="date-t" value="<?php echo $row['d_o_t'];?>" class="form-control">
      </div>
      <div class="mb-3">
      <label> SALARY</label>
      <input type="text" name="s_name" value="<?php echo $row['salary'];?>" class="form-control">
      </div>
      <div class="mb-3">
      <label>SUPERVISOR_ID</label>
      <input type="text" name="s_id" value="<?php echo $row['supervisor_id'];?>" class="form-control">
      </div>

      <div class="mb-3">
      <button type="SUBMIT" name="update" class="btn btn-primary">Update Employee</button>
      </div>
    </form>
  <?php
  if(isset($_POST['update'])){
  
    $emp_id = $_POST['ID'];
    $emp_name =  $_POST['name'];
    $emp_address = $_POST['address'];
    $emp_phone_no =  $_POST['phone'];
    $emp_email =  $_POST['email'];
    $d_o_a =  $_POST['date-a'];
    $d_o_t = $_POST['date-t'];
    $salary =  $_POST['s_name'];
    $supervisor_id =  $_POST['s_id'];
   
    $query ="UPDATE employee SET  emp_id='$emp_id',emp_name='$emp_name',emp_address='$emp_address',emp_phone_no='$emp_phone_no',emp_email='$emp_email',d_o_a='$d_o_a',d_o_t='$d_o_t',salary='$salary',
    supervisor_id='$supervisor_id' WHERE emp_id='$employee_id'";

    $query_run = mysqli_query($conn,$query);
    if($query_run){
      $_SESSION['message']="EMPLOYEE UPDATED SUCCESSFULLY";
      header("Location: index.php");
      exit(0);
    }
    else{
      $_SESSION['message']="EMPLOYEE NOT UPDATED SUCCESSFULLY";
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