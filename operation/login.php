<?php session_start();?>
<?php 	
		if(isset($_POST['email']) and isset($_POST['password']))
		{
			$email=$_POST['email'];
			$pass=$_POST['password'];
			$con=mysqli_connect('localhost','root','','wws');
			$qu="select * from admin where email='".$email."' and password='".$pass."'";
			$result=mysqli_query($con,$qu);
			$num=mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
			if($num!=0)
			{
				echo"full name :".$row['admin_name'];
				echo "contact :".$row['contact_number']."<br>";
				echo "email :".$row['email'];
				echo"hello admin";
				$qu="select * from admin where email='".$email."' and password='".$pass."'";
				$result=mysqli_query($con,$qu);
				$row=mysqli_fetch_array($result);
				$_SESSION['admin_id']=$row['admin_id'];
				header('location:../admin/admin.php');
			}
			else
			{  
				$qu="select * from user where email='".$email."' and password='".$pass."'";
				$result=mysqli_query($con,$qu);
				$num=mysqli_num_rows($result);
				$row=mysqli_fetch_array($result);
				if($num!=0)
				{
				$_SESSION['id']=$row['user_id'];
				
				// echo"<script>alert(".$_SESSION['id'].")</script>";
				$usertype=$row['usertype'];
					if($usertype=='company')
					{
						header('location:../company');
					}
					elseif ($usertype=='freelancer') 
					{
						header('location:../freelancer');
					}
				}
				else
				{
					$_SESSION['flag']=1;
				header('location:../index.php');
				}

				
			}
		}

?>