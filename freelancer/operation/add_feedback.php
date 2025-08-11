<?php session_start();

	if(isset($_POST['feedback']))
	{
		$id=$_SESSION['id'];
		$feedback=$_POST['feedback'];
		$cn=mysqli_connect('localhost','root','','wws');
		$sql="insert into feedback_detail(user_id,feedback_detail)values($id,'$feedback')";
		// echo $sql;
		mysqli_query($cn,$sql);
		mysqli_close($cn);
		echo"<script>
				alert('Feedback Added Successfully');
				window.location.href='../feedback.php';
			</script>";
	}


?>