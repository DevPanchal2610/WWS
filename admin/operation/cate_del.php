<?php session_start();?>
<?php
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$con=mysqli_connect('localhost','root','','wws');
			$que="delete from category where category_id=".$id;
			mysqli_query($con,$que);
			header('location:../category.php');

		}
?>