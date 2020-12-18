<?php
$con = mysqli_connect("localhost","root","","exam_test");
if(!$con){
	echo "DB connection Errror". mysqli_error($con);
}
?>