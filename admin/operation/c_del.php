<?php
	if(isset($_GET['id']))
				{
										$id=$_GET['id'];
										$con=mysqli_connect('localhost','root','','wws');
										$qu1="delete from city where state_id=(select state_id from state where country_id=".$id.")";
										mysqli_query($con,$qu1);
										$qu2="delete from state where country_id=".$id;
										mysqli_query($con,$qu2);
										$qu="delete from country where country_id=".$id;
										mysqli_query($con,$qu);
										header('location:../admin.php');
				}
?>