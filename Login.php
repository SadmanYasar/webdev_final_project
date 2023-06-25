<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'training')
	or die('unable to connect' . mysqli_connect_error());

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['userlevel'])) {
	$myusername = $_POST['username'];
	$mypassword = $_POST['password'];
	$mylevel = $_POST['userlevel'];

	$inputHashedPassword = sha1($mypassword);
	$sql = "SELECT * FROM login WHERE username='$myusername' and password='$inputHashedPassword' and userlevel='$mylevel'";

	if ($result = mysqli_query($con, $sql)) {
		$rows = mysqli_fetch_array($result); //fetch record row
		// mysql_num_row is counting table row
		$count = mysqli_num_rows($result);
	}

	$user_level = $rows['userlevel'];
	$user_id = $rows['fk_userid'];
	$username = $rows['username'];

	// If result matched $myusername and $mypassword, table row must be 1 row
	if ($count == 1) {
		$_SESSION["Login"] = "YES";

		// Add user information to the session (global session variables)
		$_SESSION['LEVEL'] = $user_level;
		$_SESSION['userid'] = $user_id;
		$_SESSION['username'] = $username;

		echo "<h1>You are now correctly logged in</h1>";
		if ($_SESSION['LEVEL'] == "1") {
			header("Location: Admin/Admin_homepage.php");
		} else if ($_SESSION['LEVEL'] == "2") {
			header("Location: Coordinator/coordinator.php");
		}
		if ($_SESSION['LEVEL'] == "3") {
			header("Location: Student.php");
		}
	}
	//if wrong username and password
	else {
		$_SESSION["Login"] = "NO";
		header("Location: login.html");
	}
}

?>
</body>

</html>