<?php
session_start();

// Establish database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "qrcodedb";
$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the name of the current user
$rollno = $_SESSION['RollNo'];
$sql = "SELECT * FROM qrcodedb.user WHERE RollNo='$rollno'";
$result = $conn->query($sql);

if (!$result) {
    // Query execution failed, handle the error
    echo "Error: " . $conn->error;
    exit();
}

$row = $result->fetch_assoc();
$name = $row['RollNo'];

// Check if a date range or single date is selected
if (isset($_POST['selectedDateRange']) && !empty($_POST['selectedDateRange'])) {
    $selectedDateRange = $_POST['selectedDateRange'];

    // Split the selected date range into start and end dates
    $dates = explode(" to ", $selectedDateRange);
    if (count($dates) === 2 && strtotime($dates[0]) && strtotime($dates[1])) {
        // Date range is valid, proceed with processing
        $startDate = date('Y-m-d', strtotime($dates[0]));
        $endDate = date('Y-m-d', strtotime($dates[1]));

        // Update the query to fetch data from both tables with a join operation
        $query = "SELECT vehicle_log.ID, vehicle_log.V_USERID, v_user.BRANCH_OF_SERVICE, v_user.FULLNAME, v_user.CELLPHONE_NUMBER, v_user.VEHICLE_PLATE_NUMBER, vehicle_log.TIMEIN, vehicle_log.TIMEOUT, vehicle_log.STATUS 
                  FROM vehicle_log 
                  INNER JOIN v_user ON vehicle_log.V_USERID = v_user.V_USERID
                  WHERE DATE(vehicle_log.TIMEIN) BETWEEN '$startDate' AND '$endDate'";
    } elseif (strtotime($selectedDateRange)) {
        // Single date is valid, proceed with processing
        $date = date('Y-m-d', strtotime($selectedDateRange));

        // Update the query to fetch data from both tables with a join operation
        $query = "SELECT vehicle_log.ID, vehicle_log.V_USERID, v_user.BRANCH_OF_SERVICE, v_user.FULLNAME, v_user.CELLPHONE_NUMBER, v_user.VEHICLE_PLATE_NUMBER, vehicle_log.TIMEIN, vehicle_log.TIMEOUT, vehicle_log.STATUS 
                  FROM vehicle_log 
                  INNER JOIN v_user ON vehicle_log.V_USERID = v_user.V_USERID
                  WHERE DATE(vehicle_log.TIMEIN) = '$date'";
    } else {
        // Invalid date format
        echo "Invalid date format.";
        exit();
    }
} else {
    // No date range or single date selected
    echo "No date range or single date selected.";
    exit();
}

// Execute the query
$result = $conn->query($query);

if (!$result) {
    // Query execution failed, handle the error
    echo "Error: " . $conn->error;
    exit();
}

// Generate CSV file
$filename = 'QR_Vehicle_Log_' . date('m-d-Y') . '.csv'; // Adjusted filename format
$file = fopen($filename, "w");

// Add header row indicating the name of the current user, current date, and time it was retrieved
$currentDate = date('m-d-Y H:i:s');
$header1 = "QR Vehicle Log of $selectedDateRange";
$header2 = "Retrieved by: $name";
$header3 = "Retrieve date: $currentDate";

fputcsv($file, array($header1));
fputcsv($file, array($header2));
fputcsv($file, array($header3));



// Headers for the data
$headers = array("ID", "V_USERID", "BRANCH_OF_SERVICE", "FULLNAME", "CELLPHONE_NUMBER", "VEHICLE_PLATE_NUMBER", "TIMEIN", "TIMEOUT", "STATUS");
fputcsv($file, $headers);

// Add data rows to the CSV
// Add data rows to the CSV
while ($row = $result->fetch_assoc()) {
    // Format TIMEIN always (assuming it's always set)
    $row['TIMEIN'] = date('Y-m-d H:i:s', strtotime($row['TIMEIN']));

    // Only format TIMEOUT if it's not empty/null, otherwise leave it empty
    if (!empty($row['TIMEOUT'])) {
        $row['TIMEOUT'] = date('Y-m-d H:i:s', strtotime($row['TIMEOUT']));
    } else {
        // Leave TIMEOUT empty if it's empty or null
        $row['TIMEOUT'] = ""; // This makes it explicitly empty
    }

    // Adjust status based on values "1" and "0"
    $row['STATUS'] = ($row['STATUS'] == "1") ? "OUT" : "IN";

    fputcsv($file, $row);
}


// Close the file
fclose($file);

// Set headers to force file download
header("Content-Description: File Transfer");
header("Content-Disposition: Attachment; filename=$filename");
header("Content-type: application/csv;");
readfile($filename);

// Cleanup - delete the generated CSV file
unlink($filename);
exit();
