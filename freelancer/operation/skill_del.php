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
        $itemid=$_POST['itemId'];
        if($type=='category')
        {
            $sql="delete from category_user where category_id=".$itemid." and user_id=".$id;
            insert($sql);
            echo json_encode(["msg" => $sql]);
        }
        elseif ($type=='language') 
        {
            $sql="delete from language_user_detail where language_id=".$itemid." and user_id=".$id;
            insert($sql);
            echo json_encode(["msg" => $sql]);
        }
        elseif ($type=='project_language') {
             $sql="delete from language_detail where language_id=".$itemid." and project_id=".$_SESSION['p_id'];
            insert($sql);
            echo json_encode(["msg" => $sql]);
        }
        else
        {
            echo json_encode(["msg" => "error"]);

        }
                
        

    }
?>