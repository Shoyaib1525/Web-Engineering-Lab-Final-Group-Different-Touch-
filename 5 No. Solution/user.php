<?php

	session_start();
	$message = "";
 if(isset($_SESSION['message'])){
      $message = $_SESSION['message'];
    }

include_once("connect.php");

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: index.php");
}

if(!isset($_SESSION['user'])){
  header("location: index.php");
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
 <?php  if (isset($_SESSION['user'])) : ?>
  <div class="container">
    <h4><b><?php echo $_SESSION['user']['name']; ?></b></h4>
    <p><?php echo $_SESSION['user']['user_name']; ?></p>
  </div>
 <?php endif ?>
<!-- <div style="float:right, display:inline-block;">
   
<h1>User: </h1>
 
</div> -->
<div style="float:right">

  <a href="register.php" class="btn" >Register</a>
  <a href="?logout='1'" class="btn btn2" >Logout</a>
</div>


<h3 align="center"><span style="color:green; "><?php echo $message; ?></span></h3>
	<table style="width:100%">
  <tr>
    <th>Name</th>
    <th>Id</th>
    <th>User Name</th> 
    <th>Age</th>
    <th>Action</th>
  </tr>
  <?php 
	$query = "SELECT * FROM user";
	if($result =mysqli_query($con, $query)){
		while($row = $result->fetch_assoc()){
			
	
  ?>
  <tr align="center">
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['student_id']; ?></td>
    <td><?php echo $row['user_name']; ?></td> 
    <td><?php echo $row['age']; ?></td>
    <td>
	<a href="edit_user.php?id=<?php echo $row['id'];?>">Edit</a> 
	<a href="delete_user.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you Sure To Delete!!')">Delete</a>
	</td>
  </tr>
    <?php 	} } ?>
	<?php unset($_SESSION['message']); ?>
</table>

<!-- <button type="submit"  class="backbtn" >Go Back</button></a> -->
</body>
</html>