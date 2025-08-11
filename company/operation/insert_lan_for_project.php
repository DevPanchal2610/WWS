<?php
session_start();

header('Content-Type: application/json'); 

if (isset($_POST['itemName'])) {
    $lan = $_POST['itemName'];
    $p_name = $_SESSION['p_name'];
    $id = $_SESSION['id'];
    $cn = mysqli_connect('localhost', 'root', '', 'wws');

    // Use the variable $id in the WHERE clause
    $sql = "SELECT MAX(project_id) as 'id' FROM project WHERE project_name='$p_name' AND user_id=$id";
    $result = mysqli_query($cn, $sql);
    $row = mysqli_fetch_array($result);
$_SESSION['project_id']=$row['id'];
    // Use $row['project_id'] instead of $row['id']
    $sql = "INSERT INTO language_detail(project_id, language_id) VALUES (${row['id']}, $lan)";
    mysqli_query($cn, $sql);
    echo json_encode(["msg" => "success"]);
}
?>
