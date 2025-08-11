<?php
		if(isset($_POST['password']))
		{
			$pass=$_POST['password'];
			$email=$_POST['email'];
			$cn=mysqli_connect('localhost','root','','wws');
			$sql="update admin set password='$pass' where email='$email'";
			mysqli_query($cn,$sql);
			echo "<script>alert('Password updated successfully!');
        		window.location.href='../../index.php';</script>";

			mysqli_close($cn);
		}
?>