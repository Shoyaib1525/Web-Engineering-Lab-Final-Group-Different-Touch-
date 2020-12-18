<?php
session_start();
include_once("connect.php");

//if session has user redirect to target page.
if(isset($_SESSION['user'])){
  header("location: user.php");
}

$message = "";
$error = "";
if(isset($_POST['submit'])){
    
    $user_name   = $_POST['user_name'];
    $password    = $_POST['password'];
   
    if(strlen($user_name) < 1){
        $error = "The user name field required";
    }else if(strlen($password) < 1){
        $error = "The password field required";
    }else{
        $query = "SELECT * FROM user WHERE user_name='$user_name' AND password='$password' LIMIT 1";
        $results = mysqli_query($con, $query);


            if (mysqli_num_rows($results) == 1) { // user found
            // check if user is valid user.
            $logged_in_user = mysqli_fetch_assoc($results);
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['message']  = "You are now logged in";
            header('Location: user.php');    
        }else{
              $error  = "User name or password invalid!!";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylee.css">
</head>
<body>

<section class="login-area">

    <h3 align="center"><span style="color:green; "><?php echo $message; ?></span></h3>
    <h3 align="center"><span style="color:red; "><?php echo $error; ?></span></h3>

      <form class="login-content animate" method="post">
    <div class="imgcontainer">
      <img src="./img/login-img.jpeg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>User Name</b></label>
      <input type="text" placeholder="Enter User Name" name="user_name">

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" >
         
    
      <button type="submit" name="submit">Login</button>
     
    </div>
  </form>
</section>

</body>
</html>
