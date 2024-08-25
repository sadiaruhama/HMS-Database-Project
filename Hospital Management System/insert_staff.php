<?php
// First, we need to connect to the database
require_once('connection.php');

// Check if the input in the form text fields is not empty
if (
    isset($_POST['did']) &&
    isset($_POST['name']) &&
    isset($_POST['position'])
) {
    // Assign form inputs to variables
    $u = $_POST['did'];
    $p = $_POST['name'];
    $t = $_POST['position'];

    // Prepare the SQL statement using a prepared statement
    $sql = "INSERT INTO staff (Staff_ID, Name, Position) VALUES (?, ?, ?)";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sss", $u, $p, $t);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the insertion is successful
    if ($result) {
        // Redirect to a success page if needed
        header("Location: staff.php");
    } else {
        // Redirect to an error page if needed
        header("Location: add_staff.php");
    }
} else {
    echo "All fields are required";
}
?>
