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
        <div class="title"> Add a new Doctor </div>
        
        <form action="insert_doctor.php" class="form_design" method="post">


            Doctor_ID: <input type="text" name="did"> <br>
            Name: <input type="text" name="name"> <br> 
            Speciality: <input type="text" name="speciality"> <br>
            Designation: <input type="text" name="designation"> <br>
            Degree: <input type="text" name="degree"> <br>
            Email: <input type="text" name="email"> <br>
            Phone: <input type="text" name="phone"> <br>

            <br>
            <input type="submit" value="Add to Database">
        </form>
    </section>



</body> 
</html>





