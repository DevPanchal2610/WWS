          <?php
          session_start();
          unset($_SESSION['otp']);
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$otp = rand(1000, 9999);
$_SESSION['otp']=$otp;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$email=$_GET['email'];
header('Content-Type: application/json');
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'workwithskill05@gmail.com';                     //SMTP username
    $mail->Password   = 'uwub dfxg yrvn txau';
    // $mail->Username   = 'juhilmistry05@gmail.com';                     //SMTP username
    // $mail->Password   = 'lmvpgbyoicqnbpkw';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('workwithskill05@gmail.com');
    $mail->addAddress($email);     //Add a recipient
    //Attachments
   //Optional name
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your One-Time Password (OTP)';
    $mail->Body    = "Your One-Time Password (OTP) is: <b> $otp </b>";

    $mail->send();
    echo"<font style='color:green'>Message has been sent</font>";
    // echo '<br>'.$otp;
} catch (Exception $e) {
    echo "<font style='color:red'>Message could not be sent</font>";
}
echo"<input type='hidden' id='v_otp' value='$otp'>";
?>