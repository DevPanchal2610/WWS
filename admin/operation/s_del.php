<?php
	if(isset($_GET['id']))
				{
										$id=$_GET['id'];
										$con=mysqli_connect('localhost','root','','wws');
										$qu1="delete from city where state_id=".$id;
										mysqli_query($con,$qu1);
										$qu="delete from state where state_id=".$id;
										mysqli_query($con,$qu);
										header('location:../state.php');
				}
?>