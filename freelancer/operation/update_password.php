<?php 
		session_start();
        if(isset($_POST['old_pass'])){
        $pass=$_POST['password'];

        $con=mysqli_connect('localhost','root','','wws');
        $sql="update user set password='$pass' where user_id=".$_SESSION['id'];
        mysqli_query($con,$sql);
        mysqli_close($con);
        // echo $sql;
        echo "<script>alert('Password updated successfully!');
        		window.location.href='../profile.php';</script>";
    }
	
?>