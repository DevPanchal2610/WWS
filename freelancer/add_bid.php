<?php
include "header.php";
$conn = mysqli_connect('localhost', 'root', '', 'wws');

// Check if connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_SESSION['id'])) 
{
    // Validate and sanitize input data
    $project_id = $_POST['project_id'];
    $bid_total = mysqli_real_escape_string($conn, $_POST['bid_total']);
    $days = mysqli_real_escape_string($conn, $_POST['days']);
    $currentDate = date('Y-m-d');

    // Fetch user_id from the user table based on project_id
    
        
        $user_id = $_SESSION['id'];
        
        // Insert data into bid_detail table
        $query = "INSERT INTO bid_detail (user_id, project_id, bid_total, bid_date, days) VALUES ($user_id, $project_id, $bid_total, '$currentDate', $days)";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            echo"<script>";
            echo"alert('Bid added successfully');";
            echo"window.location.href='All_projects.php';";
            echo"</script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } 

mysqli_close($conn);
include "footer.php";
?>
