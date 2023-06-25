<html>

<head>
   <link rel="shortcut icon" href="../images/transparent-logo.png" type="image/x-icon">
   <link rel="stylesheet" href="../style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
</head>

<body>
   <?php
   include "../config.php";
   include('Admin.php');
   include('../Coordinator/functionCoordinator.php');

   echo "<h1 style='text-align: center; margin-top: 50px;'>Full Students' Application List</h1>
   <h3 style='margin-left: 180px;'>(Sorted by User ID)</h3>"; 

   echo '<div class="container-insert-table1">';
   echo "<table class='bordered'>";
   echo "<tr>
      <th>No.</th>
      <th>User ID</th>
      <th>Application ID</th>
      <th>Applicant</th>
      <th>Application Date</th>
      <th>Status</th>
      <th>View Details</th>
   </tr>";

   $array = array();
   $select = "SELECT * from practical_training order by fk_userid";
   $sql = mysqli_query($GLOBALS['conn'], $select);
   $no = 1;
   while ($row = mysqli_fetch_assoc($sql)) {
      $array['appid'] = $row['applicationid'];
      $array['appdate'] = $row['applicationdate'];
      $array['status'] = $row['applicationstatus'];
      $array['userid'] = $row['fk_userid'];
      $profile = getUsersData($array['userid']);
      echo "<tr> <td>" . $no . "</td><td>" . $array['userid']. "</td><td>".$array['appid'] . "</td><td>" . $profile['name'] . "</td><td>" . $array['appdate'] . "</td><td>" . $array['status'] . "</td><td>";
      clickMe($array['userid'], $array['appid']);
      echo "</td></tr>";
      $no++;
   }
   echo "</table>";
   echo "</div>";

   function clickMe($userid, $appid)
   {
      echo "<a href='view_application.php?userid=$userid & appid=$appid'>View</a>";
   }

   ?>
</body>

</html>
<?php include '../includes/footer.php' ?>