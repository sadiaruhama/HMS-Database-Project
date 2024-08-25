<?php
// First, we need to connect to the database
require_once('connection.php');

// Check if the input in the form text fields is not empty
if (
    isset($_POST['did']) &&
    isset($_POST['name']) &&
    isset($_POST['gender']) &&
    isset($_POST['disease']) &&
    isset($_POST['age']) &&
    isset($_POST['medical_records']) &&
    isset($_POST['address']) &&
    isset($_POST['contact']) &&
    isset($_POST['feedback'])
) {
    // Assign form inputs to variables
    $u = $_POST['did'];
    $p = $_POST['name'];
    $t = $_POST['gender'];
    $g = $_POST['disease'];
    $n = $_POST['age'];
    $l = $_POST['medical_records'];
    $i = $_POST['address'];
    $r = $_POST['contact'];
    $w = $_POST['feedback'];

    // Prepare the SQL statement using a prepared statement
    $sql = "INSERT INTO patient (Patient_ID, Name, Gender, Disease, Age, Medical_Records, Address, Contact, Feedback) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssssss", $u, $p, $t, $g, $n, $l, $i, $r, $w);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the insertion is successful
    if ($result) {
        //echo "Inserted Successfully";
        // Redirect to a success page if needed
        header("Location: patient.php");
    } else {
        //echo "Insertion Failed";
        // Redirect to an error page if needed
        header("Location: add_patient.php");
    }
} 
?>
