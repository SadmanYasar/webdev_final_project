<html>

<head>
   <title>Application Homepage</title>
   <link rel="shortcut icon" href="../images/transparent-logo.png" type="image/x-icon">
   <link rel="stylesheet" href="../style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
</head>

<body>

   <!--header-->
   <div class="outercontainer-nav">
      <div class="container-logo">
         <a href="coordinator.php"><img src="../images/transparent-logo.png" alt="Logo" id="img-logo"></a>
         <p class="title">Students' Practical Training Management System</p>
      </div>

      <div class="dropdown">
         <button class="dropbtn-logo"><img src="../images/coordinator.png" alt="Coordinator logo" width="400px">
            <p>COORDINATOR</p>
         </button>
         <div class="dropdown-content">
            <a href="EditProfile_Form.php">Profile</a>
            <a href="../Logout.php?logout">Log out</a>
         </div>
      </div>
   </div>
   <nav class="stroke">
      <ul>
         <li><a href="coordinator.php">Home</a></li>
         <li><a href="ViewApplicationList.php">Validate</a></li>
         <li><a href="ViewSortedReport.php">Report</a></li>
      </ul>
   </nav>
   <!--end of header-->

   <?php
   //session_start();
   ob_start();
   session_start();
   if (isset($_SESSION['LEVEL'])) {
      // Destroy the session
      
      // Redirect the user to the login page or any other desired page
      
   }
   else 
   {
      header("Location: ../login.html");
      exit();
   }
   include('Connection.php');
   include('functionCoordinator.php');

   echo "<h1 style='text-align: center; margin-top: 50px;'>Students' Application List</h1>
   <h3 style='margin-left: 180px;'>Application Status = 'submitted'</h3>"; 

   //table
   echo '<div class="container-insert-table">';
   // echo '<div class="table-adjust">';
   echo "<table class='bordered'>";
   echo "<tr>
      <th>No.</th>
      <th>Application ID</th>
      <th>Applicant</th>
      <th>Application Date</th>
      <th>Status</th>
      <th>CLICK</th>
   </tr>";
   $array = array();
   $select = "SELECT * from practical_training where applicationstatus='submitted'";
   $sql = mysqli_query($GLOBALS['conn'], $select);
   $no = 1;

   while ($row = mysqli_fetch_assoc($sql)) {
      $array['appid'] = $row['applicationid'];
      $array['appdate'] = $row['applicationdate'];
      $array['status'] = $row['applicationstatus'];
      $array['userid'] = $row['fk_userid'];
      $profile = getUsersData($array['userid']);
      echo "<tr> <td>" . $no . "</td><td>" . $array['appid'] . "</td><td>" . $profile['name'] . "</td><td>" . $array['appdate'] . "</td><td>" . $array['status'] . "</td><td>";
      clickMe($array['userid'], $array['appid']);
      echo "</td></tr>";
      $no++;
   }
   echo "</table>";
   // echo "</div>";
   echo "</div>";

   if ($select == null) {
      echo "<p style='margin-left: 180px;'>No application need approved or rejected</p>";
   }

   function clickMe($userid, $appid)
   {
      echo "<a href='ViewApplication.php?userid=$userid&appid=$appid'>View</a>";
   }

   //links
   echo "<div class='coordinator-viewapp-links'>";
   echo "<a href='ViewSortedSubmission.php'><label class='co-viewapp-btn'>View Sorted List</label></a>";
   echo "&nbsp; &nbsp; &nbsp;";
   echo "<a href='ViewSortedReport.php'><label class='co-viewapp-btn'>View Sorted Full List</label></a>";
   echo "</div>";

   ?>

   <?php include '../includes/footer.php' ?>
</body>

</html>