<?php
        // header('Content-Type: application/json');
        if(isset($_POST['ans'])){
        $ans=$_POST['ans'];
        $email=$_POST['email'];
        $con=mysqli_connect('localhost','root','','wws');
        $sql="select * from user where email='$email' and security_ans='$ans'";
        // echo $sql;
        $result=mysqli_query($con,$sql);
        // $row = mysqli_fetch_array($result);
        if(mysqli_num_rows($result)>0)
        {
            echo json_encode(["msg"=>"data"]);
            
        }
        else
        {
             echo json_encode(["msg"=>"data not found"]);  
        }
// echo json_encode(["msg"=>"end"]);  
    }
         
    ?>