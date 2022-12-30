<?php

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
    <title>Add employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  
    <div class="container mb-9">

    <?php include('message.php');?>

    <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-header">
        <h4> EMPLOYEE ADD
        <a href="index.php" class="btn btn-danger float-end">BACK</a>
</h4>
</div>
<div class="card-body">
    <form action="code.php" method="POST">

        <div class="mb-3">
        <label> EMPLOYEE_ID</label>
        <input type="text" name="ID" class="form-control" required>
        </div>
        <div class="mb-3">
        <label> EMPLOYEE_NAME</label>
        <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
        <label> EMPLOYEE_ADDRESS</label>
        <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
        <label> EMPLOYEE_PHONE_NO</label>
        <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
        <label>EMPLOYEE_EMAIL</label>
        <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
        <label>D-O-A</label>
        <input type="date" name="date-a" class="form-control" required>
        </div>
        <div class="mb-3">
        <label> D-O-T</label>
        <input type="date" name="date-t" class="form-control">
        </div>
        <div class="mb-3">
        <label> SALARY</label>
        <input type="text" name="s_name" class="form-control">
        </div>
        <div class="mb-3">
        <button type="SUBMIT" name="SUBMIT" class="btn btn-primary">SUBMIT</button>
        </div>
        
</form>
</div>
</div>
</div>
</div>
</div>

</body>
</html>
