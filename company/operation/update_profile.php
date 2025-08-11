<?php
session_start();
if(isset($_POST))
{
	extract($_POST);
	$cn=mysqli_connect('localhost','root','','wws');
	 if($city=='tmp') {
        $city_id = $city1;
    } else {
        $city_id = $city;
    }
	
		$sql="update user set user_name='$username',gender='$gender',dob='$dob',contact_number='$mobile',user_address='$add',city_id=$city_id where user_id=".$_SESSION['id'];
	// echo $sql;
	mysqli_query($cn,$sql);
	mysqli_close($cn);
	  echo "<script>alert('Profile Updated Successfully');</script>";
    echo "<script>window.location.href='../c_profile.php';</script>";
}


?>