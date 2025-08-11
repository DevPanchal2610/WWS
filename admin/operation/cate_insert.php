
<?php session_start();
      if(isset($_POST['category']))
      {
      	$name=$_POST['category'];
      	$con=mysqli_connect('localhost','root','','wws');
                  			$qu="insert into category(category_name) values('".$name."')";
                  			mysqli_query($con,$qu);
                  			header('location:../category.php');
      }

?>