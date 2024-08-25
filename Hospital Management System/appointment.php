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
            color: #FFFFFF; /* White color */
            font-size: 24px; 
            margin-bottom: 20px; 
            /* Adding a glossy effect */
            text-shadow: 0px 0px 10px rgba(255, 255, 255, 0.8); /* Adjust the values to suit your needs */
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.2)); /* Adjust the values to suit your needs */
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
            
        }

        /* Adjusting the background color of the sign-in section */
        #section1 {
             /* Transparent background color */
            padding: 20px; 
            margin-top: 20px; 
            display: flex; /* Use flexbox */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }
        
        /* Setting the body background color */
        body {
           /* background-color: #1abc9c; /* Light baby pink */
            background-image: url("img/your-image2.jpg"); /* Add your background image */
            background-size: cover; /* Cover the entire background */
            padding: 20px 0; /* Add some padding */
        }

        .add-appointment-btn {
            border: none; /* Remove border */
            color: white; 
            padding: 20px 40px; /* Larger padding for larger button */
            text-align: center; 
            text-decoration: none;
            display: inline-block; 
            font-size: 20px; /* Larger font size */
            margin-top: 20px; 
            transition: background-color 0.3s; 
            border-radius: 10px; 
            
        }

        .add-appointment-btn:hover {
            background-color: #1abc9c; /* Darker shade on hover */
        }
    </style>
</head>
<body> 
    <!-- Header Section -->
    <header id="header">
        <div class="container">
            <div class="row">  
                <div class="col-md-2">Central Hospital</div>
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
    
    <!-- Main Content Section -->
    <section id="section1" class="container">
        <div class="add-appointment-btn"> 
            <a href="show_appointment.php">Click here to book an appointment with us</a>
        </div>
    </section>
</body>
</html>



