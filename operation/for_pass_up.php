<?php
		if(isset($_POST['password']))
		{
			$email=$_POST['email'];
			$pass=$_POST['password'];
			$cn=mysqli_connect('localhost','root','','wws');
			$sql="update user set password='$pass' where email='$email'";
			mysqli_query($cn,$sql);
			echo "<script>alert('Password updated successfully!');
        		window.location.href='../index.php';</script>";
			mysqli_close($cn);
		}
?>