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

        if (!isset($_GET['updateid'])) {
            echo "Staff ID is not provided.";
            exit();
        }

        $Staff_ID = $_GET['updateid'];

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Staff_ID = mysqli_real_escape_string($conn, $_POST['did']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $position = mysqli_real_escape_string($conn, $_POST['position']);

            $sql = "UPDATE Staff SET 
                    Name = '$name', 
                    Position = '$position' 
                    WHERE Staff_ID = '$Staff_ID'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: staff.php?updated=true&did=$Staff_ID");
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }

        $sql = "SELECT * FROM Staff WHERE Staff_ID = '$Staff_ID'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        ?>

        <!-- Main Content Section -->
        <section class="container">
            <div class="title"> Edit Staff Information </div>
            <form action="" method="post">
                <input type="hidden" name="did" value="<?php echo $row['Staff_ID']; ?>">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>"><br>
                <label for="position">Position:</label><br>
                <input type="text" id="position" name="position" value="<?php echo $row['Position']; ?>"><br>
                <input type="submit" value="Update Information">
            </form>
        </section>

        <?php
        } else {
            echo "Staff not found!";
        }
        ?>
    </section>

</body>
</html>
