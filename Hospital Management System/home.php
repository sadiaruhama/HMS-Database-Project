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
            background-image: url("img/your-image.jpg"); 
            background-size: cover; 
            padding: 20px 0; 
        }

        
        #header .col-md-2 {
        color: white; 
        font-size: 30px; 
        font-weight: bold; 
        margin-bottom: 10px; 
        padding-right: 20px;
    }


        /* Adjusting the color of the links in the header */
        #header .col-md-10 {
            text-align: left; 
            padding-top: 80px; 
        }

        #header a {
            color: white; 
            display: block; 
            margin-bottom: 50px; 
            text-decoration: none; 
            font-size: 36px; 
        }

        #header a:hover {
            text-decoration: underline; 
        }
    </style>
</head>
<body> 
    <!-- Header Section -->
    <header id="header">
        <div class="container">
            <div class="row">  
                <div class="col-md-2">Central  Hospital</div>
                <div class="col-md-10">
                    <a href="home.php">Home</a>
                    <a href="doctor.php">Doctor</a>
                    <a href="patient.php">Patient</a>
                    <a href="staff.php">Staff</a>
                    <a href="appointment.php">Appointment</a>
                    <a href="billing.php">Billing</a>
                    <a href="emergency.php">Emergency</a>
                    <a href="video_conference.php">Video Conference</a>
                </div>
            </div>
        </div>
    </header>

    <!-- JavaScript -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
</body> 
</html>







