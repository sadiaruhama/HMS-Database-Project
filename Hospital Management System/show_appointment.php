<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Hospital Management System">
   <meta name="author" content="Your Name">
   <title>Central Hospital</title>
  
   <!-- Core CSS -->
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
       <div class="title"> List of Appointments</div>
       <table class="table">
           <thead>
               <tr>
                  <th>Appointment_ID</th>
                  <th>Doctor_Name</th>
                  <th>Date</th>
                  <th>Time</th>
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
               $sql = "SELECT * FROM Appointment";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                   if (mysqli_num_rows($result) != 0) {
                       while ($row = mysqli_fetch_array($result)) {
                           ?>
                           <tr>
                               <td><?php echo $row['Appointment_ID']; ?></td>
                               <td><?php echo $row['Doctor_Name']; ?></td>
                               <td><?php echo $row['Date']; ?></td>
                               <td><?php echo $row['Time']; ?></td>
                               <td>
                                   <button class="btn btn-primary"><a href="update_appointment.php?updateid=<?php echo $row['Appointment_ID']; ?>" class="text-light">Update</a></button>
                                   <button class="btn btn-danger"><a href="delete_appointment.php?deleteid=<?php echo $row['Appointment_ID']; ?>" class="text-light">Delete</a></button>
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

   <!-- Add New Appointment Section -->
   <section id="addAppointment" class="container">
      <div class="title">Add New Appointment</div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <label for="did">Appointment ID:</label>
          <input type="text" id="did" name="did">
          <br>
          <label for="dname">Doctor Name:</label>
          <input type="text" id="dname" name="dname">
          <br>
          <label for="date">Date:</label>
          <input type="text" id="date" name="date">
          <br>
          <label for="time">Time:</label>
          <input type="text" id="time" name="time">
          <br>
          <input type="submit" value="Submit">
      </form>
  </section>

   <!-- JavaScript -->
   <script src="js/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.isotope.min.js"></script>
   <script src="js/wow.min.js"></script>

   <!-- PHP Script for Form Submission -->
   <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $conn = mysqli_connect($servername, $username, $password, $dbname);
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
       }
       $appointment_id = $_POST['did'];
       $doctor_name = $_POST['dname'];
       $date = $_POST['date'];
       $time = $_POST['time'];
       $sql = "INSERT INTO Appointment (Appointment_ID, Doctor_Name, Date, Time) 
               VALUES ('$appointment_id', '$doctor_name', '$date', '$time')";
       if (mysqli_query($conn, $sql)) {
           echo "New appointment added successfully";
       } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
       mysqli_close($conn);
   }
   ?>
</body>
</html>
