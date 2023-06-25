<!DOCTYPE html>
<html>

<head>
	<title>Edit Profile</title>
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
$query = mysqli_query($conn, "SELECT * FROM users INNER JOIN login on users.userid = login.fk_userid where userid = '$id'") or die(mysqli_connect_error());
$row = mysqli_fetch_array($query);
// $query = mysqli_query($conn, "SELECT * FROM users where userid = '$id'") or die(mysqli_connect_error());
// $query2 = mysqli_query($conn, "SELECT * FROM login where fk_userid = '$id'") or die(mysqli_connect_error());
// $row = mysqli_fetch_array($query);
// $row2 = mysqli_fetch_array($query2);
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

	<h1 style="text-align: center; margin-top: 50px;">User Profile</h1>

	<div class="outer-user-table"> <!--to move margin-->
		<form method="post" action="update_student_profile.php">
			<div class="user-table">
				<label>
					<span class="profile">Full Name : </span>
					<input type="text" name="name" value="<?php echo $row['name']; ?>" required />
				</label>
				<br>
				<label><span class="profile">Age : </span>
					<input type="number" name="age" min="1" max="200" value="<?php echo $row['age']; ?>" required />
				</label>
				<br>
				<label><span class="profile">Address : </span>
					<input type="text" name="address" value="<?php echo $row['address']; ?>" required />
				</label>
				<br>
				<label><span class="profile">Contact No. : </span>
					<input type="text" name="phone_number" value="<?php echo $row['phone']; ?>" required />
				</label>
				<br>
				<label><span class="profile">Email : </span>
					<input type="email" name="email" value="<?php echo $row['email']; ?>" required />
				</label>
				<br>
				<label><span class="profile">Password : </span>
					<input type="password" id="password" name="password" value="<?php echo $row['password']; ?>" onkeyup="check();" required />
				</label>
				<br>
				<label><span class="profile">Confirm Password : </span>
					<input type="password" id="confirmpassword" name="password_confirm" onkeyup="check();" required />
					<br>
					<span style='float:right; padding-right: 67px;' id='message'></span>
				</label>

				<br>
				<label class="button-profile">
					<input class="button-profile-update" type="submit" name="submit" value="Update" onclick="return Validate()" />
				</label>

				<script type="text/javascript">
					function Validate() {
						var password = document.getElementById('password').value;
						var confirmpassword = document.getElementById('confirmpassword').value;
						if (password != confirmpassword) {
							document.getElementById('message').style.color = 'red';
							document.getElementById('message').innerHTML = 'Not Matching';
							alert("Password does not match!");
							document.getElementById('confirmpassword').value = "";
							return false;
						}
						if (password == confirmpassword) {
							return true;
						}
					}

					var check = function() {
						if (document.getElementById('password').value == document.getElementById('confirmpassword').value) {
							document.getElementById('message').style.color = 'green';
							document.getElementById('message').innerHTML = 'Matching';
						} else {
							document.getElementById('message').style.color = 'red';
							document.getElementById('message').innerHTML = 'Not Matching';
						}
					}
				</script>

			</div>
		</form>
	</div>
	<?php include '../includes/footer.php' ?>
</body>

</html>