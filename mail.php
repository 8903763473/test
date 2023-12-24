<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php'; 

function sendEmail() {
    try {
        $mail = new PHPMailer(true);

        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mugeshthedeveloper@gmail.com';
        $mail->Password   = 'ccwihtzenkjxyvrs';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('mugeshthedeveloper@gmail.com','Vijay');
        $mail->addAddress('vijayakumar050301@gmail.com');

        // Content
        $otp = generateNumericOTP(6);

        $mail->isHTML(false);
        $mail->Subject = 'OTP From Vijay';
        $mail->Body    = "Your OTP is: $otp";

        $mail->send();
        echo 'Email sent successfully!';
        return $otp;
    } catch (Exception $e) {
        throw new Exception("Error in sending OTP Email: {$mail->ErrorInfo}");
    }
}

// Mock function for generating OTP
function generateNumericOTP($length) {
    $characters = '0123456789';
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= $characters[random_int(0, strlen($characters) - 1)];
    }
    return $otp;
}

// Example usage
$email = 'vijayakumar050301@gmail.com';
$otp = sendEmail($email);
echo "Generated OTP: $otp";
?>
