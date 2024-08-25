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
    body {
        background-color: #FFDDE2; /* Light pink */
    }
    #header {
        background-color: #FF6E82;
        border-bottom: 1px solid #E5D6E9;
        padding: 10px 0;
    }
    #header .col-md-2 {
        color: #FFFFFF;
        font-size: 24px;
        font-weight: bold;
        margin-left: -15px;
    }
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
    .title {
        color: #FF6E82;
        font-size: 24px;
        margin-bottom: 20px;
    }
    #section1 {
        background-color: #FFDDE2;
        padding: 20px;
        margin-top: 20px;
    }
       .add-doctor-btn {
            background-color: #4CAF50; 
            border: none; 
            color: white; 
            padding: 15px 30px; 
            text-align: left; 
            text-decoration: none;
            display: inline-block; 
            font-size: 15px; 
            margin-top: 20px; 
            cursor: pointer; 
            border-radius: 10px; 
            transition: background-color 0.3s; 
        }

        .add-doctor-btn:hover {
            background-color: #45a049; 
        }



</style>
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
       <div class="title" style="text-align: left;">
           <a href="add_doctor.php" class="add-doctor-btn">Add Doctor</a>
       </div>

       <div class="title"> List of Doctors</div>
       <table class="table">
           <thead>
               <tr>
                  <th>Doctor_ID</th>
                  <th>Name</th>
                  <th>Speciality</th>
                  <th>Designation</th>
                  <th>Degree</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
               </tr>
           </thead>
           <tbody>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HMS";
require_once("connection.php");
$sql = "SELECT * FROM Doctor";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) != 0) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row['Doctor_ID']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Speciality']; ?></td>
                <td><?php echo $row['Designation']; ?></td>
                <td><?php echo $row['Degree']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Phone']; ?></td>
                <td>
    <button class="btn btn-primary"><a href="update_doctor.php?updateid=<?php echo $row['Doctor_ID']; ?>" class="text-light">Update</a></button>


    <button class="btn btn-danger"><a href="delete_doctor.php?deleteid=<?php echo $row['Doctor_ID']; ?>" class="text-light">Delete</a></button>


</td>

            </tr>
            <?php
        }
    } else {
        echo "No records found"; // Print message if no records found
    }
} else {
    echo "Error: " . mysqli_error($conn); // Print error message if query fails
}
?>


           </tbody>
       </table>
   </section>
   <!-- JavaScript -->
   <script src="js/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.isotope.min.js"></script>
   <script src="js/wow.min.js"></script>
</body>
</html>




