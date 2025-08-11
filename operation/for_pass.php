<?php 
	if(isset($_GET))
	{
		$email=$_GET['email'];
		$con=mysqli_connect('localhost','root','','wws');
		$sql="select * from user where email='$email'";
		$result=mysqli_query($con,$sql);
		$row = mysqli_fetch_all($result, MYSQLI_ASSOC);


		header('Content-Type: application/json');
		echo json_encode($row);
	}
?>