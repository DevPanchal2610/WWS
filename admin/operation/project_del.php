<?php 
		if(isset($_GET['id']))
		{
			$cn= mysqli_connect('localhost','root','','wws');
			$sql="delete from project where project_id=".$_GET['id'];
			mysqli_query($cn,$sql);
			mysqli_close($cn);
			header('location:../project.php');
		}
		

?>