<?php
// First, we need to connect to the database
require_once('connection.php');

// Check if the input in the form text fields is not empty
if (
    isset($_POST['did']) &&
    isset($_POST['name']) &&
    isset($_POST['speciality']) &&
    isset($_POST['designation']) &&
    isset($_POST['degree']) &&
    isset($_POST['email']) &&
    isset($_POST['phone'])
) {
    // Assign form inputs to variables
    $u = $_POST['did'];
    $p = $_POST['name'];
    $t = $_POST['speciality'];
    $g = $_POST['designation'];
    $n = $_POST['degree'];
    $l = $_POST['email'];
    $f = $_POST['phone'];

    // Prepare the SQL statement using a prepared statement
    $sql = "INSERT INTO doctor (Doctor_ID, Name, Speciality, Designation, Degree, Email, Phone) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssss", $u, $p, $t, $g, $n, $l, $f);

    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the insertion is successful
    if ($result) {
        //echo "Inserted Successfully";
        // Redirect to a success page if needed
        header("Location: doctor.php");
    } else {
        //echo "Insertion Failed";
        // Redirect to an error page if needed
        header("Location: add_doctor.php");
    }
} else 
    echo "All fields are required"; 
?>

