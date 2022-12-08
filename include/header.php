<!DOCTYPE html>
<html>
<head>


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

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;
}

.topnav a:hover {
  background-color: yellow;
  color: black;
}

.topnav .login-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  width:120px;
}

.topnav .login-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background-color: black;
  color: white;
  font-size: 20px;
  border: none;
  cursor: pointer;
}

.topnav .login-container button:hover {
  background-color: red;
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
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="../admin_home/index.php">Home</a>
  <a href="../admin/employee/index.php">Employee</a>
  <a href="../admin/bill/index.php">Bill</a>
  <a href="../admin/item/index.php">Product</a>
  <a href="../admin/supplier/index.php">Supplier</a>
  
  <div class="login-container">
  <a href="../login/logout.php">LOG OUT</a>
  </div>
</div>



</body>
</html>
