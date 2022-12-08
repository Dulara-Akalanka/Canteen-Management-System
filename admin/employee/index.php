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
    <title>Employee Details</title>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
    <h4> Employee Details
    <a href="../../admin_home/index.php" class="btn btn-danger float-end" >BACK</a>
    <a href="employee.php" class="btn btn-primary float-end">ADD AN EMPLOYEE</a></h4>
</div>
<div class="card-body">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>EMPLOYEE<br>ID</th>
        <th>EMPLOYEE<br>NAME</th>
        <th>EMPLOYEE_ADDRESS</th>
        <th>EMPLOYEE<br>PHONE_NO</th>
        <th>EMPLOYEE_EMAIL</th>
        <th>D-O-A</th>
        <th>D-O-T</th>
        <th>SALARY</th>
        <th>SUPERVISOR<br>ID</th>
        <th>ACTION</th>
      </tr>
    </thead>
<tbody>
  <?php
    $query = "SELECT * FROM employee";
    $query_run = mysqli_query($conn,$query);
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $employee){
?>
<tr>
  <td><?=$employee['emp_id'];?></td>
  <td><?=$employee['emp_name'];?></td>
  <td><?=$employee['emp_address'];?></td>
  <td><?=$employee['emp_phone_no'];?></td>
  <td><?=$employee['emp_email'];?></td>
  <td><?=$employee['d_o_a'];?></td>
  <td><?=$employee['d_o_t'];?></td>
  <td><?=$employee['salary'];?></td>
  <td><?=$employee['supervisor_id'];?></td>
  <td>   
    <form action="update.php" method ="post">
      <input type="hidden" name="id" value="<?=$employee['emp_id']; ?>">    
      <input type="submit" value="UPDATE" name="edit" class="btn btn-success btn-sm">
    </form> 

    <form action="delete.php" method ="post">
      <input type="hidden" name="id" value="<?=$employee['emp_id']; ?>">     
      <input type="submit"  value="DELETE" name="delete" class="btn btn-danger btn-sm">
    </form> 

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