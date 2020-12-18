<?php

session_start();
include_once("connect.php");

if(!isset($_SESSION['user'])){
  header("location: index.php");
}

$message = "";
$error = "";
if(isset($_POST['submit'])){
	
    $name 	     = $_POST['name'];
    $student_id  = $_POST['student_id'];
    $user_name 	 = $_POST['user_name'];
    $password 	 = $_POST['password'];
    $age 	     = $_POST['age'];
   
    if(strlen($name) < 3){
        $error = "Whoops Name is too short!";
    }else{
        $insQuery = "INSERT INTO user(name, student_id, user_name, age, password)  VALUES ('$name', '$student_id', '$user_name', '$age', '$password')";
        if(mysqli_query($con, $insQuery))
        {
	
            $message = "Register Successfully";
			$_SESSION['message']=$message;
			header('Location: user.php');
        }
		}
}

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="stylee.css" />
</head>
<body>
<div style="float:right">
    <a href="user.php" class="btn btn2" >Back</a>
</div>
<form  method="post" >
<div class="container">
    <h1>Register</h1>
  <br />

<h3 align="center"><span style="color:green; "><?php echo $message; ?></span></h3>
<h3 align="center"><span style="color:red; "><?php echo $error; ?></span></h3>

    <label for="name"><b>Name</b></label>
    <input type="text" id="name" placeholder="Enter Name" name="name" >

    <label for="id"><b>Id</b></label>
    <input type="text" id="id" placeholder="Enter Id" name="student_id" >
	
	<label for="user_name"><b>User Name</b></label>
    <input type="text" id="user_name" placeholder="Enter User Name" name="user_name" >

    <label for="age"><b>Age</b></label><br />
    <input type="text" id="age" placeholder="Age" name="age" >

    <label for="password"><b>Password</b></label>
    <input type="password" id="password" placeholder="Enter Password" name="password" >


	  
      <button type="submit" name="submit" class="signupbtn">Submit</button>
    </div>
  </div>
</form>
</body>
</html>