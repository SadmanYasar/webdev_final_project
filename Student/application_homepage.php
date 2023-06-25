<html>
	<head>
		<title>Application Homepage</title>
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
	
	} else {
		header("Location: ../login.html");
		exit();
	}
	$id = $_SESSION['userid'];
	$test_status = "submitted";
	$query = "SELECT * FROM practical_training WHERE fk_userid = '$id'";
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
				<button class="dropbtn-logo"><img src="../images/student-girl.png" alt="Student girl logo" width="400px"> <p>STUDENT</p> </button>
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

		
		<h1 style="text-align: center; margin-top: 50px;">List of Practical Training</h1> <!--added-->

		<form method = "post" action = "app_home.php">
		<?php
		echo '<div class="container-insert-table">';
		echo '<button class="insert-button" type="submit" value="insert" name="insert">
				<i class="fa fa-plus"></i> Insert </button>
				
				<button style="margin-right:10" class="insert-button" type="submit" value="uploadcv" name="uploadcv">
				<i class="fa fa-plus"></i> Upload CV </button>
				
				<br>';
		echo '<div class="table-adjust">';
		echo "<table class='bordered'>";
		echo "<tr>";
		echo "<th>No.</th>";
		echo "<th>Title</th>";
		echo "<th>Status</th>";
		echo "<th>Edit</th>";
		echo "<th>Delete</th>";
		echo "<th>Download CV</th>";

		echo "</tr>";

		//application form
		foreach ($result as $row) {
			if ($row['applicationstatus'] != "Approve") {
				$x = $x + 1;
				echo "<tr>";
				echo "<td>" . $x . "</td>";
				echo "<td><a href = view_practical_training.php?t_id=$row[applicationid]>$row[applicationtitle]</td>";
				echo "<td>" . $row['applicationstatus'] . "</td>";
				echo "<td><a href = edit_practical_training.php?t_id=$row[applicationid]>Edit</td>";
				echo "<td><a onclick = \"javascript: return confirm('Are you sure to delete this record?'); \" href = delete_practical_training.php?t_id=$row[applicationid]>Delete</td>";
				$cvFilePath = 'cv_uploads/cv.png';
				echo "<td><a href='" . $cvFilePath . "' download>Download</a></td>";
				echo "</tr>";

			}
		}

		echo "</table>";
		echo '</div>'; //table-adjust
		echo '</div>'; //container-insert-table
		?>
		</form>

		<br><br><br>

		<?php include '../includes/footer.php' ?>
	</body>
</html>