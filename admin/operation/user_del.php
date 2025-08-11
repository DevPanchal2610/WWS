<?php 
		if(isset($_GET['id']))
		{
			$cn= mysqli_connect('localhost','root','','wws');
			$sql="delete from user where user_id=".$_GET['id'];
			mysqli_query($cn,$sql);
			mysqli_close($cn);
			header('location:../user.php');
		}
		

?>