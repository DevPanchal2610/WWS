<?php
header('Content-Type: application/json');
 $email=$_GET['email'];
  $con=mysqli_connect('localhost','root','','wws');
  $sql="select * from user where email='".$email."'";
  $result=mysqli_query($con,$sql);
  $num=mysqli_num_rows($result);
  if($num >0)
  {
  	echo json_encode(["msg" => "data"]);
  }
  else
  {
  	echo json_encode(["msg" => "no data"]);

  }
 
		
?>