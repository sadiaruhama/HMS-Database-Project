<?php
require_once('connection.php');

if (isset($_GET['deleteid'])) {
    $Doctor_ID = $_GET['deleteid']; // Retrieve the delete ID

    // Prepare the delete query
    $sql = "DELETE FROM `Doctor` WHERE Doctor_ID = '$Doctor_ID'"; 

    // Execute the delete query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Deleted Successfully";
        header('location:doctor.php'); 
        exit(); // Exit after redirect
    } else {
        echo "Deletion failed: " . mysqli_error($conn);
    }
} 
?>


