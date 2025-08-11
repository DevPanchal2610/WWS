<?php
// validate_bid_amt.php
session_start();
header('Content-Type: application/json');

// Check if bid_amt and project_id are set in the POST request
if (isset($_POST['bid_amt']) && isset($_POST['project_id'])) {
    // Retrieve the values
    $bid_amt = $_POST['bid_amt'];
    $project_id = $_POST['project_id'];

    // Perform validation or any other necessary operations
    // For example, you can check if the bid amount is valid

    // Example validation: check if bid_amt is numeric
   
    $conn = mysqli_connect('localhost', 'root', '', 'wws');
    $sql = "SELECT * FROM project WHERE project_id = $project_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($bid_amt > $row['min_bid']) {
        $response = ['message' => "You have to bid less than {$row['min_bid']}"];
    } else {
        $response = ['message' => "null"];
    }
    echo json_encode($response);
}
?>
