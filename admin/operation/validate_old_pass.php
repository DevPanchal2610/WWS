<?php
session_start();
        if(isset($_POST['old_pass'])){
        $pass=$_POST['old_pass'];
        $con=mysqli_connect('localhost','root','','wws');
        $sql="select * from admin where admin_id=".$_SESSION['admin_id']." and password='$pass'";
        $result=mysqli_query($con,$sql);
        
        if(mysqli_num_rows($result)>0)
        {
            echo "data";
        }
        else
        {
             echo "data not found";  
        }
    }
         
    ?>