<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
}
include_once('../../include/header.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- font -->
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,700|Roboto:400,700&display=swap"
      rel="stylesheet"
    />
    <!-- style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="title">
          <h1>EMPLOYEE</h1>
        </div>
        <img style="margin-top: 20px;" src="download.jpg">
        <div class="specification">
          <div class="submit"><a href="../employee/index.php">
            <button>Employee</button></a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="title">
          <h1>BILL</h1>
        </div>
        <img style="margin-top: 30px;" src="bill.jpg">
        <div class="specification">
          <div class="submit"><a href="../bill/index.php">
            <button>Bill</button></a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="title">
          <h1>PRODUCT</h1>
        </div>
       <center><img style="margin-top: 25px;width: 250px; height: 200px" src="images.jpg"></center>
        <div class="specification">
          <div class="submit"><a href="../item/index.php">
            <button>Item</button></a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="title">
          <h1>SUPPLIER</h1>
        </div>
        <center><img style="margin-top: 10px;width: 250px; height: 210px" src="sup.jpg"></center>
        <div class="specification">
          <div class="submit"><a href="../supplier/index.php">
            <button>Supplier</button></a>
          </div>
        </div>
      </div>  
    </div>
  </body>
</html>
