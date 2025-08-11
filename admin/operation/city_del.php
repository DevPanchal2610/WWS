<?php
	if(isset($_GET['id']))
				{
										$id=$_GET['id'];
										$con=mysqli_connect('localhost','root','','wws');
										$qu="delete from city where city_id=".$id;
										mysqli_query($con,$qu);
										header('location:../city.php');
				}
?>