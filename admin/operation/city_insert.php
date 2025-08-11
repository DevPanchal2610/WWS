
<?php session_start();
      if(isset($_POST['city_name']) and isset($_POST['c_id']) )
      {
      	$name=$_POST['city_name'];
      	$id=$_POST['c_id'];
      	$con=mysqli_connect('localhost','root','','wws');
                  			$qu="insert into city(city_name,state_id) values('".$name."',".$id.")";
                  			mysqli_query($con,$qu);
                  			header('location:../city.php');
      }

?>