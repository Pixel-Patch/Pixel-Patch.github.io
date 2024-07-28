<?php
session_start();
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbdata = "qrcodedb";

// Create connection
$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbdata);

// Check connection
if (!$conn) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Track login attempts
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

if (isset($_POST['signin'])) {
    if (!empty($_POST['RollNo']) && !empty($_POST['Password'])) {
        $u = trim($_POST['RollNo']);
        $p = trim($_POST['Password']);

        $sql = "SELECT * FROM qrcodedb.user WHERE RollNo=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $u);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($p, $row['Password'])) {
                $_SESSION['RollNo'] = $u;
                $_SESSION['Type'] = $row['Type']; // Set the user's type in a session variable
                $_SESSION['login_attempts'] = 0; // Reset login attempts on successful login

                // Redirect based on user type
                $redirectMap = [
                    'sadmin' => 'qr/index.php',
                    'admin' => 'qradmin/index.php',
                    'emp' => 'qremp/index.php',
                ];
                $redirectUrl = $redirectMap[$_SESSION['Type']] ?? 'qremp/index.php';
                header("Location: $redirectUrl");
                exit();
            } else {
                $_SESSION['loginError'] = 'Failed to Login! Username or Password is incorrect.';
            }
        } else {
            $_SESSION['loginError'] = 'Failed to Login! User not found.';
        }
        $_SESSION['login_attempts'] += 1;
    } else {
        $_SESSION['loginError'] = 'Failed to Login! Please fill in all fields.';
    }

    if ($_SESSION['login_attempts'] >= 3) {
        $_SESSION['loginError'] = 'Failed to Login! Please contact the System Administrator at <a href="mailto:pixelpatch@outlook.com">pixelpatch@outlook.com</a>.';
    }
}

if (isset($_SESSION['loginError'])) :
?>
    <div class="modal fade" id="loginErrorModal" tabindex="-1" role="dialog" aria-labelledby="loginErrorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginErrorModalLabel">Login Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo $_SESSION['loginError']; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn btn-open" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#loginErrorModal').modal('show');
        });
    </script>
<?php
    unset($_SESSION['loginError']); // Clear the error message after displaying it
endif;
?>