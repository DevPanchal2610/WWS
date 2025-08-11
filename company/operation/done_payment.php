<?php
session_start();
$user_id=$_SESSION['freelancer_id'];
$project_id=$_SESSION['freelancer_project_id'];
$total=$_SESSION['total_pay'];
$cn = mysqli_connect('localhost', 'root', '', 'wws');
$sql = "INSERT INTO `assign_project`(`user_id`, `project_id`) VALUES ('$user_id', '$project_id')";
mysqli_query($cn, $sql);
$currentDate = date("Y-m-d"); // Format: YYYY-MM-DD

$SQL="INSERT INTO `payment_detail`( `user_id`, `project_id`, `payment_mode`, `payment_date`, `total_payment`) VALUES ('".$_SESSION['id']."','$project_id','online','$currentDate','$total')";
mysqli_query($cn, $SQL);
mysqli_close($cn);

echo "<script>
        alert('Project assigned successfully');
        window.location.href='../index.php';
    </script>";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/Exception.php');

// Include Dompdf library files
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// Include your database connection file
$con=mysqli_connect('localhost','root','','wws');

// Function to send email and generate PDF
function sendEmailToUser($user_email, $html_content, $pdf_content)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'workwithskill05@gmail.com';
        $mail->Password   = 'uwub dfxg yrvn txau';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('workwithskill05@gmail.com', 'WWS');
        $mail->addAddress($user_email);
        $mail->addReplyTo('workwithskill05@gmail.com', 'WWS');

        $mail->isHTML(true);
        $mail->Subject = "You have one project";
        $mail->Body = $html_content;

        // Add the PDF attachment
        $mail->addStringAttachment($pdf_content, 'project_details.pdf', 'base64', 'application/pdf');

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        echo "Message could not be sent. Please contact support. Error: {$mail->ErrorInfo}";
    }
}

$cn = mysqli_connect('localhost', 'root', '', 'wws');
$sql3 = "SELECT email FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($cn, $sql3);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_email = $row['email'];
    
// $sql6 = "SELECT u.user_name AS company_name , u.email AS company_mail
//         FROM payment_detail pd
//         INNER JOIN user u ON pd.user_id = u.user_id
//         WHERE pd.project_id = '$project_id'";


// $result6 = mysqli_query($cn, $sql6);

// if ($result6 && mysqli_num_rows($result6) > 0) {
//     $row6 = mysqli_fetch_assoc($result6);
//     $company_email = $row6['company_mail'];
//     $company_name = $row6['company_name'];

    $sql_project = "SELECT p.project_name, c.category_name, p.due_date, p.description, bd.bid_total, bd.days FROM project p
                    JOIN category c ON p.category_id = c.category_id
                    LEFT JOIN bid_detail bd ON p.project_id = bd.project_id
                    WHERE p.project_id = '$project_id'";
    $result_project = mysqli_query($cn, $sql_project);

    if ($result_project && mysqli_num_rows($result_project) > 0) {
        $row_project = mysqli_fetch_assoc($result_project);

        $sql10="select user_name from user where user_id=(select user_id from project where project_id=$project_id)";
                                    $result10=mysqli_query($cn,$sql10);
                                    $row10=mysqli_fetch_array($result10);

                                    

        // HTML content with logo and increased table size
        // $html_content .= '<img src="wws1.png" alt="" style="width: 200px;"><br><br>';
        $html_content .= "<b>You got a project from ${row10['user_name']}</b>";
        $html_content .= "<h1>Project Details</h1>";
        $html_content .= "<table border='1' style='width: 100%;'>";
        // $html_content .= "<tr><td><strong>Company Name</strong></td><td>$company_name</td></tr>";
        // $html_content .= "<tr><td><strong>Company Email</strong></td><td>$company_email</td></tr>";
        $html_content .= "<tr><td><strong>Project Name</strong></td><td>" . $row_project['project_name'] . "</td></tr>";
        $html_content .= "<tr><td><strong>Category</strong></td><td>" . $row_project['category_name'] . "</td></tr>";
        $html_content .= "<tr><td><strong>Company Due Date</strong></td><td>" . $row_project['due_date'] . "</td></tr>";
        $html_content .= "<tr><td><strong>Description</strong></td><td>" . $row_project['description'] . "</td></tr>";
        $html_content .= "<tr><td><strong>Total Amount</strong></td><td>" . $row_project['bid_total'] . "</td></tr>";
        $html_content .= "<tr><td><strong>Complete project in</strong></td><td>" . $row_project['days'] . "days" . "</td></tr>";
        $html_content .= "</table>";

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html_content);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdf_content = $dompdf->output();

        // Send email with PDF attachment
        sendEmailToUser($user_email, $html_content, $pdf_content);
    } else {
            echo "Error fetching project details from the database.";
        }
    // } else {
    //     echo "Error fetching company details from the database.";
    // }
} else {
    echo "Error fetching user email from the database.";
}

mysqli_close($cn);
?>f