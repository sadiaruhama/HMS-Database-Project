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

        // Check if Patient ID is provided in the URL
        if (!isset($_GET['updateid'])) {
            echo "Patient ID is not provided.";
            exit(); // Exit if no Patient ID is provided
        }

        $Patient_ID = $_GET['updateid'];

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $gender = mysqli_real_escape_string($conn, $_POST['gender']);
            $disease = mysqli_real_escape_string($conn, $_POST['disease']);
            $age = mysqli_real_escape_string($conn, $_POST['age']);
            $medical_records = mysqli_real_escape_string($conn, $_POST['medical_records']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $contact = mysqli_real_escape_string($conn, $_POST['contact']);
            $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

            // Prepare the SQL statement for update
            $sql = "UPDATE Patient SET 
                    Name = '$name', 
                    Gender = '$gender', 
                    Disease = '$disease', 
                    Age = '$age', 
                    Medical_Records = '$medical_records', 
                    Address = '$address',
                    Contact = '$contact',
                    Feedback = '$feedback'
                    WHERE Patient_ID = '$Patient_ID'";

            // Execute the SQL statement
            $result = mysqli_query($conn, $sql);

            // Check if update was successful
            if ($result) {
                // Redirect to patient.php with the updated information
                header("Location: patient.php?updated=true&did=$Patient_ID");
                exit();
            } else {
                // Handle update failure (e.g., display error message)
                echo "Error updating record: " . mysqli_error($conn);
            }
        }

        // Fetch patient's information from the database based on provided Patient ID
        $sql = "SELECT * FROM Patient WHERE Patient_ID = '$Patient_ID'";
        $result = mysqli_query($conn, $sql);

        // Check if patient exists
        if (mysqli_num_rows($result) > 0) {
            // Fetch patient details
            $row = mysqli_fetch_assoc($result);

            // Display update form
        ?>
        <div class="title"> Edit Patient Information </div>
        <form action="update_patient.php?updateid=<?php echo $Patient_ID; ?>" method="post">
            <input type="hidden" name="did" value="<?php echo $row['Patient_ID']; ?>">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>"><br>
            <label for="gender">Gender:</label><br>
            <input type="text" id="gender" name="gender" value="<?php echo $row['Gender']; ?>"><br>
            <label for="disease">Disease:</label><br>
            <input type="text" id="disease" name="disease" value="<?php echo $row['Disease']; ?>"><br>
            <label for="age">Age:</label><br>
            <input type="text" id="age" name="age" value="<?php echo $row['Age']; ?>"><br>
            <label for="medical_records">Medical Records:</label><br>
            <input type="text" id="medical_records" name="medical_records" value="<?php echo $row['Medical_Records']; ?>"><br>
           
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" value="<?php echo $row['Address']; ?>"><br>
            <label for="contact">Contact:</label><br>
            <input type="tel" id="contact" name="contact" value="<?php echo $row['Contact']; ?>"><br><br>
            <label for="feedback">Feedback:</label><br>
            <input type="text" id="feedback" name="feedback" value="<?php echo $row['Feedback']; ?>"><br>

            <input type="submit" value="Update Information">
        </form>
        <?php
        } else {
            echo "Patient not found!";
        }
        ?>
    </section>
</body>
</html>
