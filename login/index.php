<?php   
session_start();  
// if(!isset($_SESSION["sess_user"])){  
//     header("location:index.php");  
// } else { } 
?>

<!DOCTYPE html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background"></div>
    <h1 style="color: white;">DISH - R</h1>
    <form method="post" action="login.php">
        <h3>LOGIN</h3>
        <label for="username">UserName</label>
         <input type="text" name="username" placeholder="Username" required>
         <label for="password">Password</label>
         <input type="password" name="password" placeholder="Password" required>
         </placehold>
         <button  type="submit" name="submit" >LOGIN</button>
         <div class="options">
        <div> Forgot Password</div>
        
 </div>
</form>
</body>
</html>