<?php 
session_start();
function insert($sql){
    $con=mysqli_connect('localhost','root','','wws');
    mysqli_query($con,$sql);
    mysqli_close($con);
}
header('Content-Type: application/json'); 
    if(isset($_SESSION['id']))
    {
        $type=$_POST['type'];
        $id=$_SESSION['id'];
        $itemname=$_POST['itemName'];
        if($type=='language')
        {
            $sql="INSERT INTO language_user_detail(user_id, language_id) VALUES ('$id','$itemname')";
            insert($sql);
            echo json_encode(["msg" => "lan"]);

        }
        elseif($type=='category')
        {
            $sql="INSERT INTO category_user(user_id, category_id) VALUES ('$id','$itemname')";
            insert($sql);
            echo json_encode(["msg" => "cate"]);
        }
        elseif ($type=='project_language') 
        {
            $sql="INSERT INTO language_detail(project_id, language_id)VALUES ('1','$itemname')";
            insert($sql);
            echo json_encode(["msg" => "cate"]);
        }
        else
        {
            echo json_encode(["msg" => "error"]);

        }
    }
?>