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

<body>
<?php
include "../config.php";
include('Admin.php');
//session_start();
$id=$_SESSION['userid'];

if (isset($_POST['submitted'])) {
	$errors = array();
	if (empty($_POST['username'])) {
		$errors[] = 'You forgot to enter a username.';
	} else {
		$username = mysqli_real_escape_string($conn, trim($_POST['username']));
	}
	
	if (empty($_POST['password'])) {
		$errors[] = 'You forgot to enter a password.';
	} else {
		$password = mysqli_real_escape_string($conn, trim($_POST['password']));
	}

	if (empty($_POST['userlevel'])) {
		$errors[] = 'You forgot to enter a level.';
	} else {
		$level = mysqli_real_escape_string($conn, trim($_POST['userlevel']));
	}

	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter a email.';
	} else {
		$email = mysqli_real_escape_string($conn, trim($_POST['email']));
	}

	if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter a name.';
	} else {
		$name = mysqli_real_escape_string($conn, trim($_POST['name']));
	}

	if (empty($_POST['age'])) {
		$errors[] = 'You forgot to enter a age.';
	} else {
		$age = mysqli_real_escape_string($conn, trim($_POST['age']));
	}
	
	if (empty($_POST['phone'])) {
		$errors[] = 'You forgot to enter a phone.';
	} else {
		$phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
	}

	if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter a address.';
	} else {
		$address = mysqli_real_escape_string($conn, trim($_POST['address']));
	}

	if (empty($errors)) { 
		$q = "UPDATE users SET email='$email', name='$name', age='$age', phone='$phone', address='$address' where userid='$id'";
		$q2 = "UPDATE login SET username='$username', password='$password', userlevel='$level'where fk_userid='$id'";
		$r = @mysqli_query ($conn, $q);
		$r2 = @mysqli_query ($conn, $q2);
		if (mysqli_affected_rows($conn) == 1) { 
			echo '<p>The user record has been edited.</p>';					
		} else { 
			echo '<p class="error">The user could not be edited due to a system error. </p>'; 
			echo '<p>' . mysqli_error($conn) . '<br />Query: ' . $q . '</p>'; 
		}				
	} else {
	
		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
		
	} 

} 

$q1 = "SELECT * FROM users where userid='$id'";	
$q2 = "SELECT * FROM login where fk_userid='$id'";	

echo '<h1 style="text-align: center; margin-top: 50px;">Admin Profile</h1>';

if($r = mysqli_query ($conn, $q1)){
	$r2 = mysqli_query ($conn, $q2);
	if (mysqli_num_rows($r) == 1) { 

		$row = mysqli_fetch_array ($r);
		$row2 = mysqli_fetch_array ($r2);
		echo '<div class="outer-user-table">';

		echo '<form action="edit_user.php" method="post">
			<div class="user-table">
			
			<label><span class="profile">Full Name: </span>
			<input class="blink" type="text" name="name" value="' . $row['name'] . '" /></label><br>
			
			<label><span class="profile">Age: </span>
			<input class="blink" type="number" name="age" min="1" value="' . $row['age'] . '" /></label><br>
			
			<label><span class="profile">Phone Number: </span>
			<input class="blink" type="text" name="phone" value="' . $row['phone'] . '" /></label><br>
			
			<label><span class="profile">Email: </span>
			<input class="blink" type="email" name="email" value="' . $row['email'] . '" /></label><br>
			
			<label><span class="profile">Address: </span>
			<input class="blink" type="text" name="address" value="' . $row['address'] . '" /></label><br>
            
			<label><span class="profile">Username: </span>
			<input class="blink" type="text" name="username" value="' . $row2['username'] . '" /></label><br>
	        
			<label><span class="profile">Password: </span>
			<input class="blink" type="password" name="password" value="' . $row2['password'] . '" /></label><br>
			
			<label><span class="profile">User ID: </span>
			<input class="blink" type="text" name="userid" value="' . $row['userid'] . '" /></label><br>
			
			<label><span class="profile">Role: </span>
			<select class="select" style="width: 150px;" name="userlevel">
                    <option value="" selected="selected"> - select role - </option>
                    <option value="1">Admin</option>
                    <option value="2">Coordinator</option>
                    <option value="3">Student</option>
            </select></label>
			<br> <br>
			<label class="button-profile">
				<input class="button-profile-update" type="submit" name="submit" value="Submit" />
				<input type="hidden" name="submitted" value="TRUE" />
				<input type="hidden" name="id" value="' . $id . '" />
	        </label>
			 
			 </div>
			 </form>
			 </div>';
	} else { 
		echo '<p class="error">This page has been accessed in error.</p>';
	}
	
	mysqli_close($conn);
}




include ('../includes/footer.php');
?>
</body>
</html>