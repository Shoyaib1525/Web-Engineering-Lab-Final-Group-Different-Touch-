<?php
session_start();
include_once("connect.php");

if(!isset($_SESSION['user'])){
  header("location: index.php");
}

$id = $_GET['id'];

$message = "";
$error = "";
if(isset($_POST['submit'])){
	
    $user_id 	 = $_POST['user_id'];
    $name        = $_POST['name'];
    $student_id  = $_POST['student_id'];
    $user_name   = $_POST['user_name'];
    $password    = $_POST['password'];
    $age       = $_POST['age'];
   
    
        $updateQuery = "UPDATE user SET name = '$name', user_name = '$user_name', student_id = '$student_id', password = '$password', age = '$age' WHERE id = '$user_id'";
        if(mysqli_query($con, $updateQuery))
        {
	
            $message = "Update Successfully";
			$_SESSION['message']=$message;
			header('Location: user.php');
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
 <?php 
	$query = "SELECT * FROM user WHERE id = '$id'";
	if($result =mysqli_query($con, $query)){
		while($row = $result->fetch_assoc()){
			
	
  ?>
<form  method="post">
<div class="container">
    <h1>Edit Form</h1>
  <br />

<h1 align="center"><span style="color:green; "><?php echo $message; ?></span></h1>
    <label for="name"><b>Name</b></label>
    <input type="text" id="name" placeholder="Enter Name" value="<?php echo $row['name']; ?>" name="name" >
    <input type="hidden" value="<?php echo $row['id']; ?>" name="user_id" >

     <label for="id"><b>Id</b></label>
    <input type="text" id="id" placeholder="Enter Name" value="<?php echo $row['student_id']; ?>" name="student_id">
	
	   <label for="user_name"><b>User Name</b></label>
    <input type="text" placeholder="User Name" value="<?php echo $row['user_name']; ?>"  name="user_name" >

    <label for="age"><b>Age</b></label><br />
    <input type="text" id="age" placeholder="Enter Age" value="<?php echo $row['age']; ?>" name="age" >

    <label for="password"><b>Password</b></label>
    <input type="password" id="password" placeholder="Enter Password" name="password" >

    
      <button type="submit" name="submit" class="signupbtn">UpDate</button>
	
    </div>
  </div>
</form>
      <?php 	} } ?>
</body>
</html>