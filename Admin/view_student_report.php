<?php
include "Admin.php";
include "../config.php";

if((isset($_GET['t_id']))){
	$t_id=$_GET['t_id'];
} else if ((isset($_POST['t_id']))){
	$t_id=$_POST['t_id'];
}else{
	echo '<p>This page has been accessed in error.</p>';
	include('../images/footer.html');
	exit();
}
$query2 = mysqli_query($conn, "SELECT * FROM practical_training where applicationid = '$t_id'") or die(mysqli_connect_error());
$row2 = mysqli_fetch_array($query2);
$id=$row2['fk_userid'];
$query = mysqli_query($conn, "SELECT * FROM users where userid = '$id'") or die(mysqli_connect_error());

$query3 = mysqli_query($conn, "SELECT * FROM company where fk_applicationid = '$t_id'") or die(mysqli_connect_error());
$query4 = mysqli_query($conn, "SELECT * FROM user_detail where fk_applicationid = '$t_id'") or die(mysqli_connect_error());
$row = mysqli_fetch_array($query);

$row3 = mysqli_fetch_array($query3);
$row4 = mysqli_fetch_array($query4);
?>
<html>

<head>
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
</head>
<body>


	<h1 style="text-align: center; margin-top: 50px;">Report of Practical Training Session</h1>
	<label style="display: block; text-align: end; margin-right: 105px;">
		<b>Date :</b>
		<?php echo "<span style='font-size:15px; font-weight:bold;'>" . $row2['applicationdate'] . "</span>";
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
							<td><?php echo $row4['gender']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">4.</td>
							<td class="question">Nationality</td>
							<td><?php echo $row4['nationality']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">5.</td>
							<td class="question">Matric Number</td>
							<td><?php echo $row4['matricnumber']; ?></td>
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
							<td><?php echo $row3['companyname']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">2.</td>
							<td class="question">Contact Number</td>
							<td><?php echo $row3['companycontactno']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">3.</td>
							<td class="question">Email</td>
							<td><?php echo $row3['companyemail']; ?></td>
						</tr>
					</table>
				</div>
				<div class="tableC">
					<h2>C. Practical Training Information</h2>
					<table class="tablePracticalTraining">
						<tr id="line-height-report">
							<td id="num">1.</td>
							<td class="question">Department Name</td>
							<td><?php echo $row3['department']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">2.</td>
							<td class="question">Job Title</td>
							<td><?php echo $row3['jobtitle']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">3.</td>
							<td class="question">Start Date</td>
							<td><?php echo $row3['startdate']; ?></td>
						</tr>
						<tr id="line-height-report">
							<td id="num">4.</td>
							<td class="question">End Date</td>
							<td><?php echo $row3['enddate']; ?></td>
						</tr>
					</table>
					<h4><?php echo "STATUS: " . $row2['applicationstatus']; ?></h4>
					
				</div>
			</div>
		</form>
	</div>
	<?php include '../includes/footer.php' ?>
</body>

</html>