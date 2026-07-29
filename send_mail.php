<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

function sendTelegramInvite($recipient_email, $recipient_name, $amount) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'mail.ufxcapital.in';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'support@ufxcapital.in';
        $mail->Password   = 'YOUR_CPANEL_EMAIL_PASSWORD'; // Set your Webmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('support@ufxcapital.in', 'UFX Capital');
        $mail->addAddress($recipient_email, $recipient_name);
        
        // Notification copy to your Gmail
        $mail->addBcc('rkpjalore@gmail.com');

        $telegram_link = "https://t.me/ufxcapital";

        $mail->isHTML(true);
        $mail->Subject = 'Welcome to UFX Capital - Join Private Telegram Channel';
        $mail->Body    = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px;'>
                <h2 style='color: #1a202c;'>Payment Successful!</h2>
                <p>Hi <strong>{$recipient_name}</strong>,</p>
                <p>Thank you for subscribing to <strong>UFX Capital</strong>. We have received your payment of <strong>₹{$amount}</strong>.</p>
                <p>Click the button below to join our official Telegram channel:</p>
                <div style='text-align: center; margin: 30px 0;'>
                    <a href='{$telegram_link}' style='background-color: #0088cc; color: #ffffff; padding: 14px 28px; text-decoration: none; border-radius: 6px; font-weight: bold; display: inline-block;'>Join Telegram Channel</a>
                </div>
                <p style='font-size: 13px; color: #718096;'>If the button does not work, copy and paste this link into your browser:<br><a href='{$telegram_link}'>{$telegram_link}</a></p>
                <hr style='border: none; border-top: 1px solid #edf2f7; margin: 20px 0;'>
                <p style='font-size: 12px; color: #a0aec0; text-align: center;'>UFX Capital &copy; All rights reserved.</p>
            </div>
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mail Exception: " . $mail->ErrorInfo);
        return false;
    }
}
?>
