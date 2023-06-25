<html>

<head>
	<title>Report of Practical Training Application</title>
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
$_SESSION['t_id'] = $_GET['t_id'];
$t_id = $_SESSION['t_id'];
$query = mysqli_query($conn, "SELECT * FROM users INNER JOIN practical_training INNER JOIN company INNER JOIN user_detail on users.userid = practical_training.fk_userid AND practical_training.applicationid = company.fk_applicationid = user_detail.fk_applicationid where userid = '$id' AND applicationid = '$t_id'") or die(mysqli_connect_error());
$row = mysqli_fetch_array($query);
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

	<h1 style="text-align: center; margin-top: 50px;">Report of Practical Training Session</h1>
	<label style="display: block; text-align: end; margin-right: 105px;">
		<b>Date :</b>
		<?php echo "<span style='font-size:15px; font-weight:bold;'>" . $row['applicationdate'] . "</span>";
		?>
	</label>

	<div class="outer-container">
		<form method="post" action="report.php">
			<div class="entire-table">
				<div class="tableA">
					<h2>A. Personal Information</h2>
					<table class="tablePracticalTraining">
						<tr id="line-height-report">
							<td id="num">1.</td>
							<td class="question">Applicant's Name</td>
							<td><?php echo $row['name']?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">2.</td>
							<td class="question">Age</td>
							<td><?php echo $row['age']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">3.</td>
							<td class="question">Gender</td>
							<td><?php echo $row['gender']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">4.</td>
							<td class="question">Nationality</td>
							<td><?php echo $row['nationality']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">5.</td>
							<td class="question">Matric Number</td>
							<td><?php echo $row['matricnumber']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">6.</td>
							<td class="question">Contact Number</td>
							<td><?php echo $row['phone']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">7.</td>
							<td class="question">Email</td>
							<td><?php echo $row['email']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">8.</td>
							<td class="question">Address</td>
							<td><?php echo $row['address']; ?></td>
						</tr>
					</table>
				</div>
				<div class="tableB">
					<h2>B. Company Information</h2>
					<table class="tablePracticalTraining">
						<tr id="line-height-report">
							<td id="num">1.</td>
							<td class="question">Company Name</td>
							<td><?php echo $row['companyname']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">2.</td>
							<td class="question">Contact Number</td>
							<td><?php echo $row['companycontactno']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">3.</td>
							<td class="question">Email</td>
							<td><?php echo $row['companyemail']; ?></td>
						</tr>
					</table>
				</div>
				<div class="tableC">
					<h2>C. Practical Training Information</h2>
					<table class="tablePracticalTraining">
						<tr id="line-height-report">
							<td id="num">1.</td>
							<td class="question">Department Name</td>
							<td><?php echo $row['department']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">2.</td>
							<td class="question">Job Title</td>
							<td><?php echo $row['jobtitle']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">3.</td>
							<td class="question">Start Date</td>
							<td><?php echo $row['startdate']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">4.</td>
							<td class="question">End Date</td>
							<td><?php echo $row['enddate']; ?></td>
						</tr>
					</table>
					<h4><?php echo "STATUS: " . $row['applicationstatus']; ?></h4>
					<input class="button-training" type="submit" name="submit" value="Back">
				</div>
			</div>
		</form>
	</div>
	<?php include '../includes/footer.php' ?>
</body>

</html>