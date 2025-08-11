<?php
session_start();
header('Content-Type: application/json'); 

$lan = $_POST['itemId'];
$p = $_SESSION['project_id'];

$cn = mysqli_connect('localhost', 'root', '', 'wws');
$sql = "DELETE FROM language_detail WHERE language_id = $lan AND project_id = $p";

$result = mysqli_query($cn, $sql);

if ($result) {
    echo json_encode(["msg" => "success"]);
} else {
    echo json_encode(["msg" => "error", "error" => mysqli_error($cn)]);
}

mysqli_close($cn);
?>
