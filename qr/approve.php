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

    public function approveVisitor($row)
    {
        $stmt = $this->conn->prepare("INSERT INTO visitor (V_USERID, userType, sponsor, visitReason, name, email, gender, birthdate, cellphoneNumber, address, vModel, vType, vColor, vPlateNumber, avatarImage, driversLicenseImage, vehicleImage, dateRegistered, visitDate, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'APPROVED')");
        $stmt->bind_param("sssssssssssssssssss", $row['V_USERID'], $row['userType'], $row['sponsor'], $row['visitReason'], $row['name'], $row['email'], $row['gender'], $row['birthdate'], $row['cellphoneNumber'], $row['address'], $row['vModel'], $row['vType'], $row['vColor'], $row['vPlateNumber'], $row['avatarImage'], $row['driversLicenseImage'], $row['vehicleImage'], $row['dateRegistered'], $row['visitDate']);
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

    public function logActivity($name, $V_USERID)
    {
        date_default_timezone_set('Asia/Manila');
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt = $this->conn->prepare("INSERT INTO activity_log (id, name, action, user_id, table_name, table_column, old_value, new_value, timestamp) VALUES (NULL, ?, 'APPROVED', ?, 'temp_visitor', 'All', 'All', 'APPROVED', ?)");
        $stmt->bind_param("sss", $name, $V_USERID, $currentDateTime);
        return $stmt->execute();
    }
}

// Email sending class
class EmailSender
{
    public function sendApprovalEmail($recipientEmail, $visitorName, $visitDate, $title, $emailId, $mobNo, $qrCodePath)
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
            $mail->Subject = 'Visit Request Approved';
            $mail->Body = $this->generateEmailBody($visitorName, $visitDate, $qrCodePath);
            $mail->addEmbeddedImage($qrCodePath, 'qrcode', 'qrcode.png');

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    private function generateEmailBody($visitorName, $visitDate, $qrCodePath)
    {
        return "
            <center>
                <table border='0' cellpadding='0' cellspacing='0' style='min-width:100%;width:100%;max-width:100%;margin:0 auto;background:transparent;background-color:transparent' align='center' valign='top' role='presentation'>
                    <tbody>
                        <tr>
                            <td dir='ltr' valign='top'>
                                <div class='main_Div_section' style='font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;color:#3c4043;font-size:16px;font-weight:normal;line-height:24px;margin:0 auto;padding:0;max-width:600px'>
                                    <table class='main_Div_section' border='0' cellpadding='0' cellspacing='0' style='min-width:100%;width:100%;background:transparent;background-color:transparent' bgcolor='transparent' align='left' valign='top' role='presentation'>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table class='main_Div_section' border='0' cellpadding='0' cellspacing='0' style='min-width:100%;width:100%;max-width:600px;margin:0 auto' align='center' valign='top' role='presentation'>
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
                <table class='main_Div_section' border='0' cellpadding='0' cellspacing='0' style='min-width:100%;width:100%;max-width:600px;margin:0 auto' align='center' valign='top' role='presentation'>
                    <tbody>
                        <tr>
                            <td dir='ltr' valign='top'>
                                <div class='main_Div_section' style='font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif;color:#3c4043;font-size:16px;font-weight:normal;line-height:24px;margin:0 auto;padding:0;max-width:600px'>
                                    <div class='div_main_first' style='color:#1967d2;font-size:28px;font-weight:normal;line-height:36px;margin:24px 32px 48px 32px;font-family:Google Sans,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                        Visit Request Approved
                                    </div>
                                    <div class='div_main' style='margin:0px 32px 32px 32px;font-size:16px;line-height:24px;font-weight:normal'>
                                        Dear $visitorName,<br><br>
                                        Thank you for your recent application to visit Malacanang Park, Manila. We are pleased to inform you that your application has been approved.<br><br>
                                        Please note the following important information:<br><br>
                                        <center><strong><span style='font-size: larger;'>Your visit is scheduled for: $visitDate.</span></strong><br><br>
                                          <img src='cid:qrcode' alt='QR Code' style='width: 300px; height: 300px'></center><br><br>
                                        <strong><span>Important Note:</span></strong> The QR code provided can only be used once and can only be used on the specific scheduled date. You will need to reapply if you wish to visit again.<br><br>
                                        We look forward to welcoming you to Malacanang Park.<br><br>
                                      
                                    </div>
                                    <div class='div_main' style='margin:0px 32px 32px 32px;font-size:16px;line-height:24px;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                        <table cellspacing='0' cellpadding='0' border='0' role='presentation'>
                                            <tbody>
                                                <tr>
                                                    <td style='font-size:16px;line-height:24px;color:#3c4043;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                                        Sincerely,
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style='font-weight:normal;font-size:16px;line-height:24px;color:#3c4043;font-weight:normal;font-family:Google Sans Text,Roboto,Segoe UI,Helvetica Neue,Frutiger,Frutiger Linotype,Dejavu Sans,Trebuchet MS,Verdana,Arial,sans-serif'>
                                                        The QRv Team
                                                    </td>
                                                </tr>
                                                <br>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style='border-top:1px solid #bdbdbd;padding-top:12px;text-align:center;line-height:24px'>
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

// Function to generate QR Code
function generateQRCode($data, $filePath)
{
    include('../id/phpqrcode/qrlib.php');
    $dir = dirname($filePath);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    // Calculate the optimal pixel size for a 300x300px image
    $desiredSize = 300; // The desired size in pixels
    $errorCorrectionLevel = QR_ECLEVEL_L; // Error correction level
    $matrixPointSize = 10; // Matrix point size (higher values produce larger QR codes)

    // Create a temporary file with a higher resolution
    $tempFilePath = $filePath . '.tmp';
    QRcode::png($data, $tempFilePath, $errorCorrectionLevel, $matrixPointSize, 2);

    // Resize the temporary QR code image to the desired size
    $sourceImage = imagecreatefrompng($tempFilePath);
    $resizedImage = imagescale($sourceImage, $desiredSize, $desiredSize);

    // Save the resized image to the final file path
    imagepng($resizedImage, $filePath);

    // Clean up
    imagedestroy($sourceImage);
    imagedestroy($resizedImage);
    unlink($tempFilePath);
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

if (isset($_POST['id'])) {
    $id = $conn->real_escape_string($_POST['id']);

    $visitorResult = $visitorHandler->getVisitorRecord($id);

    if ($visitorResult->num_rows > 0) {
        $row = $visitorResult->fetch_assoc();
        $V_USERID = $row['V_USERID'];
        $email = $row['email'];
        $visitorName = $row['name'];
        $visitDate = $row['visitDate'];

        $qrCodePath = 'temps/' . $V_USERID . '_' . $visitDate . '.png';
        $qrData = $V_USERID; // Replace with actual data
        generateQRCode($qrData, $qrCodePath);

        if ($visitorHandler->approveVisitor($row)) {
            if ($visitorHandler->deleteVisitor($id)) {
                $activityLogger->logActivity($name, $V_USERID);
                $emailSender->sendApprovalEmail($email, $visitorName, $visitDate, $title, $emailId, $mobNo, $qrCodePath);
                echo "Visitor approved successfully!";
                header("Location: visitorInfo.php");
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        } else {
            echo "Error approving record: " . $conn->error;
        }
    } else {
        echo "No record found with ID: " . $id;
    }
} else {
    echo "ID parameter is not set in the POST request";
}

$db->close();
