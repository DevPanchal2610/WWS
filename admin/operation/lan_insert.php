
<?php session_start();
      if(isset($_POST['language']))
      {
      	$name=$_POST['language'];
      	$con=mysqli_connect('localhost','root','','wws');
                  			$qu="insert into language(language_name) values('".$name."')";
                  			mysqli_query($con,$qu);
                  			header('location:../language.php');
      }

?>