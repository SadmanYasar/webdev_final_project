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

echo "<h1 style='text-align: center; margin-top: 50px;'>Student's Profile Search Result</h1>";

$select = "SELECT * from users u JOIN login l ON u.userid = l.fk_userid where l.userlevel=3 AND $column like '%$search%'";

$result = $GLOBALS['conn']->query($select);

if ($result->num_rows > 0){

//table
echo '<div class="container-insert-table">';
echo "<table class='bordered'>";
 echo "<tr>
	<th>No.</th>
	<th>User ID</th>
	<th>Name</th>
	<th>Phone No.</th>
	<th>Email</th>
	<th>Age</th>
	<th>Address</th>
 </tr>";
 $no=1;
while($row = $result->fetch_assoc() ){
   $row=getUsersData($row["userid"]);
		echo "<tr><td>".$no. "</td><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row['email']."</td><td>".$row['age']."</td><td>".$row['address']."</td></tr>";
		$no++;
	}
	echo "</table>";
	echo "<br> <br> <br>";
	echo "</div>";

} else {
	echo "<p style='font-size: 20px; font-weight: bold; margin-left: 200px;'>0 records</p>";
}

$conn->close();

?>

   <?php include '../includes/footer.php' ?>

</body>
</html>