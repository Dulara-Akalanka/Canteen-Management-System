<?php   
session_start();  
?>

<!DOCTYPE html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <div class="background"></div>
 <a href="../home_page/index.html"><img src="logo2.png"  width="300px" height="100px" class="LOGIN"></a>

    <form method="post" action="login.php">
        <h3>LOGIN</h3>
        <label for="username">Username</label>
         <input type="text" name="username" placeholder="Username" required>
         <label for="password">Password</label>
         <input type="password" name="password" placeholder="Password" required>
         </placeholder>
         <button  type="submit" name="submit" >LOGIN</button>
        
        

</form>
</body>
</html>