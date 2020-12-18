<?php
session_start();
include_once("connect.php");
$id =$_GET['id'];
$del_sql = "DELETE FROM user WHERE id = '$id'";

if (mysqli_query($con, $del_sql)) {
		$message = "Delete Successfully";
		$_SESSION['message']=$message;
} else {
    echo "Error deleting record: " . mysqli_error($con);
}     

	header("Location: user.php");

?>