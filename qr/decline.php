<?php
session_start(); // Make sure to start the session

// Database configuration
$server = "localhost";
$username = "root";
$password = "";
$dbname = "qrcodedb";

// Database connection class
class Database
{
    private $connection;

    public function __construct($server, $username, $password, $dbname)
    {
        $this->connection = new mysqli($server, $username, $password, $dbname);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function close()
    {
        $this->connection->close();
    }
}

// User handling class
class UserHandler
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUserDetails($rollno)
    {
        $stmt = $this->conn->prepare("SELECT RollNo, Name, title, EmailId, MobNo FROM qrcodedb.user WHERE RollNo = ?");
        $stmt->bind_param("s", $rollno);
        $stmt->execute();
        return $stmt->get_result();
    }
}

// Visitor handling class
class VisitorHandler
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getVisitorRecord($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM temp_visitor WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function archiveVisitor($row, $reason)
    {
        $stmt = $this->conn->prepare("INSERT INTO archived_visitor (id, V_USERID, userType, sponsor, visitReason, name, email, gender, birthdate, cellphoneNumber, address, vModel, vType, vColor, vPlateNumber, avatarImage, driversLicenseImage, vehicleImage, dateRegistered, status, declineReason) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Declined', ?)");
        $stmt->bind_param("ssssssssssssssssssss", $row['id'], $row['V_USERID'], $row['userType'], $row['sponsor'], $row['visitReason'], $row['name'], $row['email'], $row['gender'], $row['birthdate'], $row['cellphoneNumber'], $row['address'], $row['vModel'], $row['vType'], $row['vColor'], $row['vPlateNumber'], $row['avatarImage'], $row['driversLicenseImage'], $row['vehicleImage'], $row['dateRegistered'], $reason);
        return $stmt->execute();
    }

    public function deleteVisitor($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM temp_visitor WHERE id = ?");
        $stmt->bind_param("s", $id);
        return $stmt->execute();
    }
}

// Activity logging class
class ActivityLogger
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function logActivity($name, $V_USERID, $reason)
    {
        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt = $this->conn->prepare("INSERT INTO activity_log (id, name, action, user_id, table_name, table_column, old_value, new_value, timestamp) VALUES (NULL, ?, 'Declined', ?, 'temp_visitor', 'All', 'All', ?, ?)");
        $stmt->bind_param("ssss", $name, $V_USERID, $reason, $currentDateTime);
        return $stmt->execute();
    }
}

// Email sending class
class EmailSender
{
    public function sendDeclineEmail($recipientEmail, $declineReason, $visitorName, $title, $emailId, $mobNo)
    {
        require '../vendor/autoload.php';

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
            $mail->addAddress($recipientEmail);

            $mail->isHTML(true);
            $mail->Subject = 'Visit Request Declined';
            $mail->Body = $this->generateEmailBody($visitorName, $declineReason);

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    private function generateEmailBody($visitorName, $declineReason)
    {
        return "
            <div style='font-size:0px;line-height:0px;color:#ffffff;display:none'>&nbsp;</div>
            <center>
                <table border='0' cellpadding='0' cellspacing='0' style='min-width:100%;width:100%;max-width:100%;margin:0 auto;background:transparent;background-color:transparent' align='center' valign='top' role='presentation'>
                    <tbody>
                        <tr>
                            <td dir='ltr' valign='top'>
                                <div class='main_Div_section' style='font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans Stretched Trebuchet MS,Verdana,Arial,sans-serif;color:#3c4043;font-size:14px;font-weight:normal;line-height:21px;margin:0 auto;padding:0;max-width:600px'>
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
}

// Main script logic
$db = new Database($server, $username, $password, $dbname);
$conn = $db->getConnection();

$userHandler = new UserHandler($conn);
$visitorHandler = new VisitorHandler($conn);
$activityLogger = new ActivityLogger($conn);
$emailSender = new EmailSender();

// Initialize variables
$name = "Not found";
$title = "";
$emailId = "";
$mobNo = "";
$rollno = "";

if (isset($_SESSION['RollNo'])) {
    $rollno = $_SESSION['RollNo'];
    $userResult = $userHandler->getUserDetails($rollno);

    if ($userResult->num_rows > 0) {
        $row = $userResult->fetch_assoc();
        $name = $row['Name'];
        $title = $row['title'];
        $emailId = $row['EmailId'];
        $mobNo = $row['MobNo'];
    }
} else {
    echo "RollNo is not set in the session";
    exit();
}

if (isset($_POST['id']) && isset($_POST['reason'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $reason = $conn->real_escape_string($_POST['reason']);

    $visitorResult = $visitorHandler->getVisitorRecord($id);

    if ($visitorResult->num_rows > 0) {
        $row = $visitorResult->fetch_assoc();
        $V_USERID = $row['V_USERID'];
        $email = $row['email'];
        $visitorName = $row['name'];

        if ($visitorHandler->archiveVisitor($row, $reason)) {
            if ($visitorHandler->deleteVisitor($id)) {
                $activityLogger->logActivity($name, $V_USERID, $reason);
                $emailSender->sendDeclineEmail($email, $reason, $visitorName, $title, $emailId, $mobNo);
                echo "Visitor declined successfully!";
                header("Location: pendingVisitor.php"); // Replace with the actual path to your original page
                exit();
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        } else {
            echo "Error archiving record: " . $conn->error;
        }
    } else {
        echo "No record found with ID: " . $id;
    }
} else {
    echo "ID or reason parameter is not set in the POST request";
}

$db->close();
