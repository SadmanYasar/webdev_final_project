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
            <a href="#">Profile</a>
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
$search = $_POST['search'];
$column = $_POST['column'];

include ('Connection.php');
include('functionCoordinator.php');

echo "<h1 style='text-align: center; margin-top: 50px;'>Student's Practical Training Application Search Result</h1>";

$select = "SELECT * from practical_training where $column like '%$search%'";

$result = $GLOBALS['conn']->query($select);

if ($result->num_rows > 0){
        //table
        echo '<div class="container-insert-table">';
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
        $no=1;
        while($array = $result->fetch_assoc() ){
                $profile=getUsersData($array['fk_userid']);
                echo "<tr><td>".$no."</td><td>".$array['fk_userid']."</td><td>".$array['applicationid']."</td><td>".$profile['name']."</td><td>".$array['applicationdate']."</td><td>".$array['applicationstatus']."</td><td>";
                clickMe($array['fk_userid'], $array['applicationid']);
                echo "</td></tr>";
                $no++;
        }
        echo "</table>";
	echo "<br> <br> <br>";
	echo "</div>";  
} else {
	echo "<p style='font-size: 20px; font-weight: bold; margin-left: 200px;'>0 records</p>";
}

function clickMe ($userid, $appid)
 {
    echo "<a href='ViewApplication.php?userid=$userid&appid=$appid'>View</a>";
 }

$conn->close();

?>

<?php include '../includes/footer.php' ?>

</body>
</html>