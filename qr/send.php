<?php
require '../vendor/autoload.php';

// Email sending class
class EmailSender
{
    public function sendDeclineEmail($declineReason, $visitorName)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'pixelpatch.yt@gmail.com';
            $mail->Password = 'juvc mxlj pmbf iemu';
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('pixelpatch.yt@gmail.com', 'QRv Admin');
            $mail->addAddress('bagarra@gmail.com');  // Static recipient email

            $mail->isHTML(true);
            $mail->Subject = 'Visit Request Declined';
            $mail->Body = $this->generateDeclineEmailBody($visitorName, $declineReason);

            $mail->send();
            echo 'Decline message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function sendAcceptanceEmail($visitorName, $visitDate)
    {
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'pixelpatch.yt@gmail.com';
            $mail->Password = 'juvc mxlj pmbf iemu';
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('pixelpatch.yt@gmail.com', 'QRv Admin');
            $mail->addAddress('bagarrap@gmail.com');  // Static recipient email

            $mail->isHTML(true);
            $mail->Subject = 'Visit Request Accepted';
            $mail->Body = $this->generateAcceptanceEmailBody($visitorName, $visitDate);

            $mail->send();
            echo 'Acceptance message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    private function generateDeclineEmailBody($visitorName, $declineReason)
    {
        return "
            <div style='font-size:0px;line-height:0px;color:#ffffff;display:none'>&nbsp;</div>
            <center>
                <table border='0' cellpadding='0' cellspacing='0' style='min-width:100%;width:100%;max-width:100%;margin:0 auto;background:transparent;background-color:transparent' align='center' valign='top' role='presentation'>
                    <tbody>
                        <tr>
                            <td dir='ltr' valign='top'>
                                <div class='main_Div_section' style='font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;color:#3c4043;font-size:14px;font-weight:normal;line-height:21px;margin:0 auto;padding:0;max-width:600px'>
                                    <table class='main_Div_section' border='0' cellpadding='0' cellspacing='0' style='min-width:100%;width:100%;background:transparent;background-color:transparent' bgcolor='transparent' align='left' valign='top' role='presentation'>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table class='main_Div_section' border='0' cellpadding='0' cellspacing='0' style='min-width:600px;width:600px;max-width:600px;margin:0 auto' align='center' valign='top' role='presentation'>
                                                        <tbody>
                                                            <tr>
                                                                <td class='logo_class' dir='ltr' style='border-bottom:1px solid #dadce0;padding:0px 32px'>
                                                                    <a href='#' style='text-decoration:none;outline:0;border:0'>
                                                                        <img src='https://i.ibb.co/bRDbcX9/Untitled-design-3.png' width='100' alt='Google' vspace='6' align='left' class='CToWUd' data-bit='iit'>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </center>
            <center>
                <table class='main_Div_section' border='0' cellpadding='0' cellspacing='0' style='min-width:600px;width:600px;max-width:600px;margin:0 auto' align='center' valign='top' role='presentation'>
                    <tbody>
                        <tr>
                            <td dir='ltr' valign='top'>
                                <div class='main_Div_section' style='font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;color:#3c4043;font-size:14px;font-weight:normal;line-height:21px;margin:0 auto;padding:0;max-width:600px'>
                                    <div class='div_main_first' style='color:#1967d2;font-size:30px;font-weight:normal;line-height:42px;margin:24px 32px 48px 32px;font-family:Google Sans,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                        Visit Request Declined
                                    </div>
                                    <div class='div_main' style='margin:0px 32px 32px 32px;font-size:14px;line-height:21px;font-weight:normal'>
                                        Dear $visitorName,<br><br>
                                        Thank you for your recent application to visit Malacanang Park, Manila. We appreciate your interest in our facility.<br><br>
                                        After careful review, we regret to inform you that your application has been declined. Unfortunately, we cannot accommodate your request at this time due to: <br><br>
                                        <strong><span style='font-size: larger;'>$declineReason.</span></strong><br><br>
                                        Should you have any questions or need further assistance, please do not hesitate to contact us.<br><br>
                                        We apologize for any inconvenience this may have caused and hope to welcome you to Malacanang Park in the near future.
                                    </div>
                                    <div class='div_main' style='margin:0px 32px 32px 32px;font-size:14px;line-height:21px;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                        <table cellspacing='0' cellpadding='0' border='0' role='presentation'>
                                            <tbody>
                                                <tr>
                                                    <td style='font-size:14px;line-height:21px;color:#3c4043;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                                        Sincerely,
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style='font-weight:normal;font-size:14px;line-height:21px;color:#3c4043;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                                        The QRv Team
                                                    </td>
                                                </tr>
                                                <br>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class='div_main' style='margin:0px 32px 32px 32px;font-size:14px;line-height:21px;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                        <table cellspacing='0' cellpadding='0' border='0' role='presentation'>
                                            <tbody>
                                                <tr>
                                                    <td style='font-weight:normal;font-size:14px;line-height:21px;color:#3c4043;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                                        We encourage you to address the issue mentioned and reapply using the following button: <br><br>
                                                        <div class='div_main' style='margin:0px 32px 32px 32px;font-size:14px;line-height:21px;font-weight:normal'>
                                                            <center><a href='#' style='border-radius:4px;background-color:#1967d2;border:0;color:#ffffff;display:inline-block;font-size:16px;font-weight:500;line-height:24px;padding:14px 24px;text-align:center;text-decoration:none;border-radius:4px;vertical-align:middle;letter-spacing:0.1px' target='_blank'>
                                                                <span dir='ltr' style='font-family:Google Sans,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;font-size:16px;line-height:24px'>&nbsp;Reapply Your Visitor's Application Here&nbsp;</span>
                                                            </a></center>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style='border-top:1px solid #bdbdbd;padding-top:12px;text-align:center;line-height:21px'>
                                        <div>
                                            <div style='margin:12px 12px;font-size:12px;line-height:18px;color:#444444;margin-bottom:0px;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;font-size:12px;line-height:20px;font-weight:bold;margin-top:15px;direction:ltr;margin-top:8px'>
                                                Malacañang Park, Paco Manila
                                            </div>
                                            <div style='margin:12px 12px;font-size:12px;line-height:18px;color:#444444;margin-top:0px;margin-bottom:32px;padding-top:0px;margin-top:16px;margin-bottom:16px;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;font-size:12px;line-height:20px;padding:0px 25px;word-break:normal'>
                                                You are receiving this email to keep you informed about your recent visit application to Malacañang Park.
                                            </div>
                                        </div>
                                        <div>
                                            <img src='https://i.ibb.co/8Md5rH3/Untitled-design-2-removebg-preview.png' width='150' style='margin:0' alt='Google' class='CToWUd' data-bit='iit'>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </center>
        ";
    }

    private function generateAcceptanceEmailBody($visitorName, $visitDate)
    {
        return "
            <div style='font-size:0px;line-height:0px;color:#ffffff;display:none'>&nbsp;</div>
            <center>
                <table border='0' cellpadding='0' cellspacing='0' style='min-width:100%;width:100%;max-width:100%;margin:0 auto;background:transparent;background-color:transparent' align='center' valign='top' role='presentation'>
                    <tbody>
                        <tr>
                            <td dir='ltr' valign='top'>
                                <div class='main_Div_section' style='font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;color:#3c4043;font-size:14px;font-weight:normal;line-height:21px;margin:0 auto;padding:0;max-width:600px'>
                                    <table class='main_Div_section' border='0' cellpadding='0' cellspacing='0' style='min-width:100%;width:100%;background:transparent;background-color:transparent' bgcolor='transparent' align='left' valign='top' role='presentation'>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table class='main_Div_section' border='0' cellpadding='0' cellspacing='0' style='min-width:600px;width:600px;max-width:600px;margin:0 auto' align='center' valign='top' role='presentation'>
                                                        <tbody>
                                                            <tr>
                                                                <td class='logo_class' dir='ltr' style='border-bottom:1px solid #dadce0;padding:0px 32px'>
                                                                    <a href='#' style='text-decoration:none;outline:0;border:0'>
                                                                        <img src='https://i.ibb.co/bRDbcX9/Untitled-design-3.png' width='100' alt='Google' vspace='6' align='left' class='CToWUd' data-bit='iit'>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </center><center>
                <table class='main_Div_section' border='0' cellpadding='0' cellspacing='0' style='min-width:600px;width:600px;max-width:600px;margin:0 auto' align='center' valign='top' role='presentation'>
                    <tbody>
                        <tr>
                            <td dir='ltr' valign='top'>
                                <div class='main_Div_section' style='font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;color:#3c4043;font-size:14px;font-weight:normal;line-height:21px;margin:0 auto;padding:0;max-width:600px'>
                                    <div class='div_main_first' style='color:#1967d2;font-size:30px;font-weight:normal;line-height:42px;margin:24px 32px 48px 32px;font-family:Google Sans,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                        Visit Request Accepted
                                    </div>
                                    <div class='div_main' style='margin:0px 32px 32px 32px;font-size:14px;line-height:21px;font-weight:normal'>
                                        Dear $visitorName,<br><br>
                                        Thank you for your recent application to visit Malacanang Park, Manila. We are pleased to inform you that your application has been accepted.<br><br>
                                        Please note the following important information:<br><br>
                                        <strong><span style='font-size: larger;'>Your visit is scheduled for: $visitDate.</span></strong><br><br>
                                        <strong><span style='font-size: larger;'>Important Note:</span></strong> The QR code provided can only be used once and can only be used on the specific scheduled date. You will need to reapply if you wish to visit again.<br><br>
                                        We look forward to welcoming you to Malacanang Park.
                                    </div>
                                    <div class='div_main' style='margin:0px 32px 32px 32px;font-size:14px;line-height:21px;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                        <table cellspacing='0' cellpadding='0' border='0' role='presentation'>
                                            <tbody>
                                                <tr>
                                                    <td style='font-size:14px;line-height:21px;color:#3c4043;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                                        Sincerely,
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style='font-weight:normal;font-size:14px;line-height:21px;color:#3c4043;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                                        The QRv Team
                                                    </td>
                                                </tr>
                                                <br>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style='border-top:1px solid #bdbdbd;padding-top:12px;text-align:center;line-height:21px'>
                                        <div>
                                            <div style='margin:12px 12px;font-size:12px;line-height:18px;color:#444444;margin-bottom:0px;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;font-size:12px;line-height:20px;font-weight:bold;margin-top:15px;direction:ltr;margin-top:8px'>
                                                Malacañang Park, Paco Manila
                                            </div>
                                            <div style='margin:12px 12px;font-size:12px;line-height:18px;color:#444444;margin-top:0px;margin-bottom:32px;padding-top:0px;margin-top:16px;margin-bottom:16px;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;font-size:12px;line-height:20px;padding:0px 25px;word-break:normal'>
                                                You are receiving this email to keep you informed about your recent visit application to Malacañang Park.
                                            </div>
                                        </div>
                                        <div>
                                            <img src='https://i.ibb.co/8Md5rH3/Untitled-design-2-removebg-preview.png' width='150' style='margin:0' alt='Google' class='CToWUd' data-bit='iit'>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </center><center>
                <table class='main_Div_section' border='0' cellpadding='0' cellspacing='0' style='min-width:600px;width:600px;max-width:600px;margin:0 auto' align='center' valign='top' role='presentation'>
                    <tbody>
                        <tr>
                            <td dir='ltr' valign='top'>
                                <div class='main_Div_section' style='font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;color:#3c4043;font-size:14px;font-weight:normal;line-height:21px;margin:0 auto;padding:0;max-width:600px'>
                                    <div class='div_main_first' style='color:#1967d2;font-size:30px;font-weight:normal;line-height:42px;margin:24px 32px 48px 32px;font-family:Google Sans,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                        Visit Request Accepted
                                    </div>
                                    <div class='div_main' style='margin:0px 32px 32px 32px;font-size:14px;line-height:21px;font-weight:normal'>
                                        Dear $visitorName,<br><br>
                                        Thank you for your recent application to visit Malacanang Park, Manila. We are pleased to inform you that your application has been accepted.<br><br>
                                        Please note the following important information:<br><br>
                                        <strong><span style='font-size: larger;'>Your visit is scheduled for: $visitDate.</span></strong><br><br>
                                        <strong><span>Important Note:</span></strong> <br> The QR code provided  <strong> can only be used ONCE ONLY</strong> and <strong>can only be used on the SPECIFIC SCHEDULED DATE</strong>. 
                                        
                                        <br><br>
                                        You will need to reapply if you wish to visit again.<br><br>
                                        We look forward to welcoming you to Malacanang Park.
                                    </div>
                                    <div class='div_main' style='margin:0px 32px 32px 32px;font-size:14px;line-height:21px;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                        <table cellspacing='0' cellpadding='0' border='0' role='presentation'>
                                            <tbody>
                                                <tr>
                                                    <td style='font-size:14px;line-height:21px;color:#3c4043;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                                        Sincerely,
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style='font-weight:normal;font-size:14px;line-height:21px;color:#3c4043;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                                        The QRv Team
                                                    </td>
                                                </tr>
                                                <br>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style='border-top:1px solid #bdbdbd;padding-top:12px;text-align:center;line-height:21px'>
                                        <div>
                                            <div style='margin:12px 12px;font-size:12px;line-height:18px;color:#444444;margin-bottom:0px;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;font-size:12px;line-height:20px;font-weight:bold;margin-top:15px;direction:ltr;margin-top:8px'>
                                                Malacañang Park, Paco Manila
                                            </div>
                                            <div style='margin:12px 12px;font-size:12px;line-height:18px;color:#444444;margin-top:0px;margin-bottom:32px;padding-top:0px;margin-top:16px;margin-bottom:16px;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;font-size:12px;line-height:20px;padding:0px 25px;word-break:normal'>
                                                You are receiving this email to keep you informed about your recent visit application to Malacañang Park.
                                            </div>
                                        </div>
                                        <div>
                                            <img src='https://i.ibb.co/8Md5rH3/Untitled-design-2-removebg-preview.png' width='150' style='margin:0' alt='Google' class='CToWUd' data-bit='iit'>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </center>
        ";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $action = $data['action'];
    $visitorName = $data['visitorName'];
    $visitDate = $data['visitDate'];
    $reason = $data['reason'];

    $emailSender = new EmailSender();

    if ($action == 'accept') {
        $emailSender->sendAcceptanceEmail($visitorName, $visitDate);
    } else if ($action == 'decline') {
        $emailSender->sendDeclineEmail($reason, $visitorName);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Test Email</title>
</head>

<body>
    <h1>Test Email Sender</h1>
    <button id="sendAcceptEmailButton">Send Acceptance Email</button>
    <button id="sendDeclineEmailButton">Send Decline Email</button>

    <script>
        document.getElementById('sendAcceptEmailButton').addEventListener('click', function() {
            fetch('send.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: 'accept',
                        visitorName: 'Test Visitor',
                        visitDate: '2024-06-08'
                    })
                })
                .then(response => response.text())
                .then(data => alert(data))
                .catch(error => console.error('Error:', error));
        });

        document.getElementById('sendDeclineEmailButton').addEventListener('click', function() {
            fetch('send.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: 'decline',
                        visitorName: 'Test Visitor',
                        reason: 'Testing the email functionality'
                    })
                })
                .then(response => response.text())
                .then(data => alert(data))
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>

</html>