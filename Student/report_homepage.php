<html>

<head>
	<title>Report Homepage</title>
	<link rel="shortcut icon" href="../images/transparent-logo.png" type="image/x-icon">
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
</head>

<?php
include "mysqli_connect.php";
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
$id = $_SESSION['userid'];
$query = "SELECT * FROM practical_training WHERE fk_userid = '$id' AND applicationstatus = 'Approve'";
$result = mysqli_query($conn, $query) or die(mysqli_connect_error());
$x = 0;
?>

<body>
	<!--header-->
	<div class="outercontainer-nav">
		<div class="container-logo">
			<a href="../Student.php"><img src="../images/transparent-logo.png" alt="Logo" id="img-logo"></a>
			<p class="title">Students' Practical Training Management System</p>
		</div>

		<div class="dropdown">
			<button class="dropbtn-logo"><img src="../images/student-girl.png" alt="Student girl logo" width="400px">
				<p>STUDENT</p>
			</button>
			<div class="dropdown-content">
				<a href="edit_student_profile.php">Profile</a>
				<a href="../Logout.php?logout">Log out</a>
			</div>
		</div>
	</div>

	<nav class="stroke">
		<ul>
			<li><a href="../Student.php">Home</a></li>
			<li><a href="application_homepage.php">Apply</a></li>
			<li><a href="report_homepage.php">Report</a></li>
		</ul>
	</nav>
	<!--end of header-->

	<h1 style="text-align: center; margin-top: 50px;">List of Approved Report</h1> <!--added-->
	<form method="post">
		<?php

		echo '<div class="container-insert-table">';
		echo '<div class="table-adjust">';
		echo "<table class='bordered'>";
		echo "<tr>";
		echo "<th>No.</th>";
		echo "<th>Title</th>";
		echo "<th>Report</th>";
		echo "</tr>";

		//table form
		foreach ($result as $row) {
			$x = $x + 1;
			echo "<tr>";
			echo "<td>" . $x . "</td>";
			echo "<td>$row[applicationtitle]</td>";
			echo "<td><a href = view_report.php?t_id=$row[applicationid]>View</td>";
			echo "</tr>";
		}
		?>
		</table>
		</div>
		</div>
	</form>
	<br><br><br>
</body>

</html>
<?php include '../includes/footer.php' ?>