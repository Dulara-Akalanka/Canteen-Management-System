<?php
require'../include/dbcon.php';

// session_start();
// if(!isset($_SESSION['username'])) {
//     header("Location: ../index.php");
// }
// include_once('../../include/header.php');
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Available Items</title>
    
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: black;
}

.topnav h1 {
  
  display: block;
  color: red;
  text-align: center;
  padding: 8px 8px;
  text-decoration: none;
  font-size: 40px;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  width:120px;
}

@media screen and (max-width: 600px) {
  .topnav .login-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .login-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
  . topnav topic{
    float:right;
  }
}
</style>
</head>

  <body>

<!-- <div class="container"> -->
<div class="row">

<div class="topnav">
<img src="images/logo2.PNG" />
<div class="topic">
  <h1>Welcome to DISH - R</h1>
</div>
</div>
<div class="col-md-12">
<div class="card">
<div class="card-header">
    <h4> Food Available Now
    <a href="index.html" class="btn btn-danger float-end" >BACK</a>
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
<!-- </div> -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>