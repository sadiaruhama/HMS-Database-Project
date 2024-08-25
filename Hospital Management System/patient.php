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
       .add-patient-btn {
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

        .add-patient-btn:hover {
            background-color: #45a049; 
        }

        .sort-form {
            display: flex;
            justify-content: center; 
            margin-bottom: 20px; 
        }
        .sort-input {
            width: 50%; 
            margin-right: 10px; 
        }
        .sort-button {
            width: 80px; 
            background-color: #87CEEB; 
            border: none;
            cursor: pointer;
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
   <form action="" method="get" class="sort-form">
      <input type="text" name="sort_text" placeholder="Enter text to sort" class="sort-input">
      <button type="submit" class="sort-button">Sort</button>
   </form>
   <!-- Main Content Section -->
   <section id="section1" class="container">
       <div class="title" style="text-align: left;">
           <a href="add_patient.php" class="add-patient-btn">Add Patient</a>
       </div>

       <div class="title">List of Patients</div>
       <table class="table">
           <thead>
               <tr>
                  <th>Patient ID</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Disease</th>
                  <th>Age</th>
                  <th>Medical Records</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Feedback</th>
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
               
               if(isset($_GET['sort_text'])) {
                   $sortText = $_GET['sort_text'];
                   $sql = "SELECT * FROM Patient WHERE Name LIKE '%$sortText%'";
               } else {
                   $sql = "SELECT * FROM Patient";
               }
               
               $result = mysqli_query($conn, $sql);

               if ($result) {
                   if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                           ?>
                           <tr>
                               <td><?php echo $row['Patient_ID']; ?></td>
                               <td><?php echo $row['Name']; ?></td>
                               <td><?php echo $row['Gender']; ?></td>
                               <td><?php echo $row['Disease']; ?></td>
                               <td><?php echo $row['Age']; ?></td>
                               <td><?php echo $row['Medical_Records']; ?></td>
                               <td><?php echo $row['Address']; ?></td>
                               <td><?php echo $row['Contact']; ?></td>
                               <td><?php echo $row['Feedback']; ?></td>
                               <td>
                                   <button class="btn btn-primary"><a href="update_patient.php?updateid=<?php echo htmlspecialchars($row['Patient_ID']); ?>" class="text-light">Update</a></button>
                                   <button class="btn btn-danger"><a href="delete_patient.php?deleteid=<?php echo htmlspecialchars($row['Patient_ID']); ?>" class="text-light">Delete</a></button>
                               </td>
                           </tr>
                           <?php
                       }
                   } else {
                       echo "<tr><td colspan='10'>No records found</td></tr>";
                   }
               } else {
                   echo "<tr><td colspan='10'>Error: " . mysqli_error($conn) . "</td></tr>";
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
