
<?php session_start();
      if(isset($_POST['state_name']) and isset($_POST['c_id']) )
      {
      	$name=$_POST['state_name'];
      	$id=$_POST['c_id'];
      	$con=mysqli_connect('localhost','root','','wws');
                  			$qu="insert into state(state_name,country_id) values('".$name."',".$id.")";
                  			mysqli_query($con,$qu);
                  			header('location:../state.php');
      }

?>