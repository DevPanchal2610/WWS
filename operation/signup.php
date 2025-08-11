<?php session_start(); 	?>
<?php
			$con=mysqli_connect('localhost','root','','wws');
			$user=$_POST["uname"];
			$gen=$_POST["gender"];
			$mobile=$_POST["cont"];
			$add=$_POST["add"];
			$dob=$_POST["dob"];
			$s_que=$_POST["s_que"];
			$s_ans=$_POST["s_ans"];
			$usertype=$_POST["usertype"];
			$email=$_POST["email"];
			$pass=$_POST["password"];
			$city=$_POST["city"];
			$_SESSION['email']=$email;
		$qu="INSERT INTO `user`(`user_name`, `password`, `email`, `gender`, `contact_number`, `user_address`, `usertype`, `dob`, `security_que`, `security_ans`, `city_id`, `is_active`) VALUES ('${user}','${pass}','${email}','${gen}','${mobile}','${add}','${usertype}','${dob}','${s_que}','${s_ans}','${city}','1')";
		mysqli_query($con,$qu);
		mysqli_close($con);
		
			if(isset($_SESSION['email']))
				{
			$con=mysqli_connect('localhost','root','','wws');
		$sql="select * from user where email='".$_SESSION['email']."'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);
		$_SESSION['id']=$row['user_id'];
		echo"<script>console.log('".$_SESSION['id']."')</script>";
}

		if($usertype=='company')
		{
			header('location:../company/index.php');
		}
		elseif($usertype=='freelancer')
		{
			header('location:../freelancer/user_cate.php');
		}

?>