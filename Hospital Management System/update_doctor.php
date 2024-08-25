<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Hospital Management System">
    <meta name="author" content="Your Name">
    <title>Central Hospital</title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet"> 

    <style>
         /* Adjusting the color of the header */
         #header {
            background-color: #FF6E82; 
            border-bottom: 1px solid #E5D6E9; 
            padding: 10px 0; 
        }

        /* Adjusting the color of the header text */
        #header .col-md-2 {
            color: #FFFFFF;
            font-size: 24px; 
            font-weight: bold;
            margin-left: -15px; 
        }

        /* Adjusting the color of the links in the header */
        #header .col-md-10 {
            text-align: right; 
            padding-top: 10px; 
        }

        #header a {
            color: #FFFFFF; 
            margin-left: 20px; 
            text-decoration: none; 
        }

        #header a:hover {
            text-decoration: underline; 
        }

        /* Adjusting the color of the section title */
        .title {
            color: #FF6E82; 
            font-size: 24px; 
            margin-bottom: 20px;
        }

        /* Adjusting the background color of the sign-in section */
        #section1 {
            background-color: #FFDDE2; 
            padding: 20px; 
            margin-top: 20px; 
        }
    </style>
</head>
<body> 
    <!-- Header Section -->
    <header id="header">
        <!-- Header content -->
    </header>
    
    <!-- Main Content Section -->
    <section id="section1" class="container">
        <div class="title"> </div>
        
        <?php
require_once('connection.php');

// Check if Doctor ID is provided in the URL
if (!isset($_GET['updateid'])) {
    echo "Doctor ID is not provided.";
    exit(); // Exit if no Doctor ID is provided
}

$Doctor_ID = $_GET['updateid'];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Doctor_ID = mysqli_real_escape_string($conn, $_POST['did']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $speciality = mysqli_real_escape_string($conn, $_POST['speciality']);
    $designation = mysqli_real_escape_string($conn, $_POST['designation']);
    $degree = mysqli_real_escape_string($conn, $_POST['degree']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Prepare the SQL statement for update
    $sql = "UPDATE Doctor SET 
            Name = '$name', 
            Speciality = '$speciality', 
            Designation = '$designation', 
            Degree = '$degree', 
            Email = '$email', 
            Phone = '$phone' 
            WHERE Doctor_ID = '$Doctor_ID'";

    // Execute the SQL statement
    $result = mysqli_query($conn, $sql);

    // Check if update was successful
    if ($result) {
        // Redirect to doctor.php with the updated information
        header("Location: doctor.php?updated=true&did=$Doctor_ID");
        exit();
    } else {
        // Handle update failure (e.g., display error message)
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Fetch doctor's information from the database based on provided Doctor ID
$sql = "SELECT * FROM Doctor WHERE Doctor_ID = '$Doctor_ID'";
$result = mysqli_query($conn, $sql);

// Check if doctor exists
if (mysqli_num_rows($result) > 0) {
    // Fetch doctor details
    $row = mysqli_fetch_assoc($result);

    // Display update form
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        
    </head>
    <body>

        
        <!-- Main Content Section -->
        <section id="section1" class="container">
            <div class="title"> Edit Doctor Information </div>
            <form action="update_doctor.php?updateid=<?php echo $Doctor_ID; ?>" method="post">
                <input type="hidden" name="did" value="<?php echo $row['Doctor_ID']; ?>">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>"><br>
                <label for="speciality">Speciality:</label><br>
                <input type="text" id="speciality" name="speciality" value="<?php echo $row['Speciality']; ?>"><br>
                <label for="designation">Designation:</label><br>
                <input type="text" id="designation" name="designation" value="<?php echo $row['Designation']; ?>"><br>
                <label for="degree">Degree:</label><br>
                <input type="text" id="degree" name="degree" value="<?php echo $row['Degree']; ?>"><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="<?php echo $row['Email']; ?>"><br>
                <label for="phone">Phone:</label><br>
                <input type="tel" id="phone" name="phone" value="<?php echo $row['Phone']; ?>"><br><br>
                <input type="submit" value="Update Information">
            </form>
        </section>
    </body>
    </html>
    <?php
} else {
    echo "Doctor not found!";
}
?>

