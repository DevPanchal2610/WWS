
<?php session_start();
      if(isset($_POST['country_name']))
      {
      	$name=$_POST['country_name'];
      	$con=mysqli_connect('localhost','root','','wws');
                  			$qu="insert into country(country_name) values('".$name."')";
                  			mysqli_query($con,$qu);
                  			header('location:../admin.php');
      }

?>