<?php
// Include the database connection file
include 'dbconn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $action = $_POST['action'];
    $user_id = $_POST['user_id'];
    $table_name = $_POST['table_name'];
    $table_column = $_POST['table_column'];
    $old_value = $_POST['old_value'];
    $new_value = $_POST['new_value'];
    $timestamp = date('Y-m-d H:i:s'); // Get the current timestamp

    // Prepare the SQL statement
    $sql = "INSERT INTO `activity_log`(`id`, `name`, `action`, `user_id`, `table_name`, `table_column`, `old_value`, `new_value`, `timestamp`)
    VALUES (NULL, '$name', '$action', '$user_id', '$table_name', '$table_column', '$old_value', '$new_value', '$timestamp')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!-- HTML form -->
<!DOCTYPE html>
<html>

<body>

    <h2>Activity Log Form</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="action">Action:</label><br>
        <input type="text" id="action" name="action"><br>
        <label for="user_id">User ID:</label><br>
        <input type="text" id="user_id" name="user_id"><br>
        <label for="table_name">Table Name:</label><br>
        <input type="text" id="table_name" name="table_name"><br>
        <label for="table_column">Table Column:</label><br>
        <input type="text" id="table_column" name="table_column"><br>
        <label for="old_value">Old Value:</label><br>
        <input type="text" id="old_value" name="old_value"><br>
        <label for="new_value">New Value:</label><br>
        <input type="text" id="new_value" name="new_value"><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>