<?php 
		session_start();
        if(isset($_POST['old_pass'])){
        $pass=$_POST['password'];

        $con=mysqli_connect('localhost','root','','wws');
        $sql="update admin set password='$pass' where admin_id=".$_SESSION['admin_id'];
        mysqli_query($con,$sql);
        mysqli_close($con);
        // echo $sql;
        echo "<script>alert('Password updated successfully!');
        		window.location.href='../change_pass.php';</script>";
    }
	
?>