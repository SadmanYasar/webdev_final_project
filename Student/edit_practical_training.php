<html>

<head>
	<title>Practical Training Application</title>
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
				<a href="Student/edit_student_profile.php">Profile</a>
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

	<h1 style="text-align: center; margin-top: 50px;">Application of Practical Training Session</h1>
	<label style="display: block; text-align: end;">
		<b>Date :</b>
		<input id="remove-border" style="font-size:15px; font-weight: bold;" type="text" name="applicationdate" value="<?php echo $row['applicationdate']; ?>" readonly />
	</label>

	<div class="outer-container">
		<form method="post" action="update_practical_training.php">
			<div class="entire-table">
				<div class="tableA">
					<h2>A. Personal Information</h2>
					<table class="tablePracticalTraining">
						<tr>
							<td id="num">1.</td>
							<td class="question">Applicant's Name</td>
							<td><input id="remove-border" type="text" name="name" value="<?php echo $row['name']; ?>" readonly /></td>

							<td id="num">5.</td>
							<td class="question">Matric Number</td>
							<td><input type="text" name="matric_number" value="<?php echo $row['matricnumber']; ?>" required /></td>
						</tr>
						<tr>
							<td id="num">2.</td>
							<td class="question">Age</td>
							<td><input id="remove-border" type="number" name="age" value="<?php echo $row['age']; ?>" readonly /></td>

							<td id="num">6.</td>
							<td class="question">Contact Number</td>
							<td><input id="remove-border" type="text" name="phone_number" value="<?php echo $row['phone']; ?>" readonly /></td>
						</tr>
						<tr>
							<td id="num">3.</td>
							<td class="question">Gender</td>
							<td><input id="remove-border" type="text" name="gender" value="<?php echo $row['gender']; ?>" readonly /></td>

							<td id="num">7.</td>
							<td class="question">Email</td>
							<td><input id="remove-border" type="email" name="email" value="<?php echo $row['email']; ?>" readonly /></td>
						</tr>
						<tr>
							<td id="num">4.</td>
							<td class="question">Nationality</td>
							<td><input type="text" name="nationality" value="<?php echo $row['nationality']; ?>" required /></td>

							<td id="num">8.</td>
							<td class="question">Address</td>
							<td><input id="remove-border" type="text" name="address" value="<?php echo $row['address']; ?>" readonly /></td>
					</table>
				</div>
				<div class="tableB">
					<h2>B. Company Information</h2>
					<table class="tablePracticalTraining">
						<tr>
							<td id="num">1.</td>
							<td class="question">Company Name</td>
							<td><input type="text" name="company_name" value="<?php echo $row['companyname']; ?>" required /></td>
						</tr>
						<tr>
							<td id="num">2.</td>
							<td class="question">Contact Number</td>
							<td><input type="text" name="contact_number" value="<?php echo $row['companycontactno']; ?>" required /></td>
						</tr>
						<tr>
							<td id="num">3.</td>
							<td class="question">Email</td>
							<td><input type="email" name="company_email" value="<?php echo $row['companyemail']; ?>" required /></td>
						</tr>
					</table>
				</div>

				<div class="tableC">
					<h2>C. Practical Training Information</h2>
					<table class="tablePracticalTraining">
						<tr>
							<td id="num">1.</td>
							<td class="question">Department Name</td>
							<td><input type="text" name="dep_name" value="<?php echo $row['department']; ?>" required /></td>
						</tr>
						<tr>
							<td id="num">2.</td>
							<td class="question">Job Title</td>
							<td><input type="text" name="job_title" value="<?php echo $row['jobtitle']; ?>" required /></td>
						</tr>
						<tr>
							<td id="num">3.</td>
							<td class="question">Start Date</td>
							<td><input type="date" name="start_date" value="<?php echo $row['startdate']; ?>" id="start_date" onkeyup="check1();" required /><span id='message1' style='padding-left: 30px;'></span></td>
						</tr>
						<tr>
							<td id="num">4.</td>
							<td class="question">End Date</td>
							<td><input type="date" name="end_date" value="<?php echo $row['enddate']; ?>" id="end_date" onkeyup="check2();" required /><span id='message2' style='padding-left: 30px;'></span></td>
						</tr>
					</table>
				</div>
				<label>
					<input class="button-training" type="submit" name="submit" value="Update" onclick="return Validate()" />
				</label>

				<script type="text/javascript">
					function Validate() {
						if (check1() === true && check2() === true) {
							return true;
						} else if (check1() === true && check2() === false) {
							alert("The end date is invalid!");
							return false;
						} else if (check1() === false && check2() === true) {
							alert("The start date is invalid!");
							return false;
						} else {
							alert("The start and end date is invalid!");
							return false;
						}
					}

					function check1() {
						var Startdate = new Date(document.getElementById('start_date').value);
						var now = new Date();
						if (now > Startdate) {
							return false;
						} else {
							return true;
						}
					}

					function check2() {
						var Startdate = new Date(document.getElementById('start_date').value);
						var Enddate = new Date(document.getElementById('end_date').value);
						if (Enddate < Startdate) {
							return false;
						} else {
							return true;
						}
					}

					var check1 = function() {
						var Startdate = new Date(document.getElementById('start_date').value);
						var now = new Date();
						if (now > Startdate) {
							document.getElementById('message1').style.color = 'red';
							document.getElementById('message1').innerHTML = 'Start date should be later than application date.';
							return false;
						} else {
							return true;
						}
					}

					var check2 = function() {
						var Startdate = new Date(document.getElementById('start_date').value);
						var Enddate = new Date(document.getElementById('end_date').value);
						if (Enddate < Startdate) {
							document.getElementById('message2').style.color = 'red';
							document.getElementById('message2').innerHTML = 'End date should be later than start date.';
							return false;
						} else {
							return true;
						}
					}
				</script>


		</form>

</body>

</html>