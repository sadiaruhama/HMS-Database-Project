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

        // Check if Appointment ID is provided in the URL
        if (!isset($_GET['updateid'])) {
            echo "Appointment ID is not provided.";
            exit(); // Exit if no Appointment ID is provided
        }

        $Appointment_ID = $_GET['updateid'];

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Doctor_Name = mysqli_real_escape_string($conn, $_POST['doctor_name']);
            $Date = mysqli_real_escape_string($conn, $_POST['date']);
            $Time = mysqli_real_escape_string($conn, $_POST['time']);

            // Prepare the SQL statement for update
            $sql = "UPDATE Appointment SET 
                    Doctor_Name = '$Doctor_Name', 
                    Date = '$Date', 
                    Time = '$Time' 
                    WHERE Appointment_ID = '$Appointment_ID'";

            // Execute the SQL statement
            $result = mysqli_query($conn, $sql);

            // Check if update was successful
            if ($result) {
                // Redirect to show_appointment.php with the updated information
                header("Location: show_appointment.php?updated=true&did=$Appointment_ID");
                exit();
            } else {
                // Handle update failure (e.g., display error message)
                echo "Error updating record: " . mysqli_error($conn);
            }
        }

        // Fetch appointment's information from the database based on provided Appointment ID
        $sql = "SELECT * FROM Appointment WHERE Appointment_ID = '$Appointment_ID'";
        $result = mysqli_query($conn, $sql);

        // Check if appointment exists
        if (mysqli_num_rows($result) > 0) {
            // Fetch appointment details
            $row = mysqli_fetch_assoc($result);

            // Display update form
            ?>
            <div class="title"> Edit Appointment Information </div>
            <form action="update_appointment.php?updateid=<?php echo $Appointment_ID; ?>" method="post">
                <label for="doctor_name">Doctor Name:</label><br>
                <input type="text" id="doctor_name" name="doctor_name" value="<?php echo $row['Doctor_Name']; ?>"><br>
                <label for="date">Date:</label><br>
                <input type="date" id="date" name="date" value="<?php echo $row['Date']; ?>"><br>
                <label for="time">Time:</label><br>
                <input type="text" id="time" name="time" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" title="Enter time in HH:MM:SS format" value="<?php echo $row['Time']; ?>"><br>

                <input type="submit" value="Update Appointment">
            </form>
            <?php
        } else {
            echo "No appointment found with ID: $Appointment_ID";
        }
        ?>
    </section>
</body> 
</html>




