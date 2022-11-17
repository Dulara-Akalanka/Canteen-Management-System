<?php

if(isset($_POST["submit"])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once('conn.php');

    $query="SELECT * FROM role WHERE username='$username' && password ='$password'";

    $result = mysqli_query($conn,$query);

    $row = mysqli_fetch_array($result);

    if($row["user_type"] == "admin"){
        header ("Location: ../admin_home/index.html");
    }
    elseif($row["user_type"] == "cashier"){
        header ("Location: ../bill page/index.php");
    }

    // if ($num>0) {
    //     header ("Location: ../admin_home/index.html");
    // }else {
    //     echo" <script>alert('Invalid Username and Password')</script>";

    //     echo" <script>location.href='index.php'</script>";
    // }

}
//     $query=mysql_query("SELECT * FROM login WHERE username='$username' AND password='$password'");  
//     $numrows=mysql_num_rows($query);  
//     if($numrows!=0)  
//     {  
//     while($row=mysql_fetch_assoc($query))  
//     {  
//     $dbusername=$row['username'];  
//     $dbpassword=$row['password'];  
//     }  
  
//     if($username  == $dbusername && $password == $dbpassword)  
//     {  
//     session_start();  
//     $_SESSION['username ']=$username;  
  
//     /* Redirect browser */  
//     header("Location: index.html");  
//     }  
//     } else {  
//     echo "Invalid username or password!";  
//     }  
    
// }
// else{
//     header("location: index.php");
//     exit();
// }

 






// $username=$_POST['username'];
// $password=$_POST['password'];

// if (isset($_POST['login'])){

//     $sql="SELECT * FROM access_info WHERE username='$username' && password ='$password';";
//     $result = $conn->query($sql);
   
//     $num=$result->num_rows;
//    // var_dump($result);
//     if ($num>0) {
//        // require_once("data.php");
//        $_SESSION['username']=$username;
//        header ("Location: data.php");
//        // echo "Login Successfully";
//     }else {
//         echo "Invalid Username and Password";
//        // header ("Location: index.php");
//        echo" <script>alert('Invalid Username and Password')</script>";

//       echo" <script>location.href='index.php'</script>";
//     }
//     echo "Hi";

