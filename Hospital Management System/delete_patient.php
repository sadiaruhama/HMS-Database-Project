<?php
require_once('connection.php');

if (isset($_GET['deleteid'])) {
    $Patient_ID = $_GET['deleteid']; // Retrieve the delete ID

    // Prepare the delete query
    $sql = "DELETE FROM `Patient` WHERE Patient_ID = '$Patient_ID'"; 

    // Execute the delete query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Deleted Successfully";
        header('location:patient.php'); 
        exit(); // Exit after redirect
    } else {
        echo "Deletion failed: " . mysqli_error($conn);
    }
} 
?>