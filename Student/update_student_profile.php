<?php
	session_start();
	include "mysqli_connect.php";

	if(isset($_POST['submit'])) {
		$id = $_SESSION['userid'];
		$fullname = $_POST['name'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		$contact_no = $_POST['phone_number'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "UPDATE users SET 
		name = '$fullname', 
		age = '$age', 
		address = '$address', 
		phone = '$contact_no', 
		email = '$email'  
		WHERE userid = '$id'";
		$result = mysqli_query($conn, $query) or die(mysqli_connect_error());
		$query2 = "UPDATE login SET 
		password = '$password' WHERE fk_userid = '$id'";
		$result2 = mysqli_query($conn, $query2) or die(mysqli_connect_error());

		//made changes here
		if($result && $result2) {
			echo '<script language="javascript">';
			echo 'alert("Update Successfully!")
			window.location.replace("edit_student_profile.php");
			</script>';
			
		}
		else {	
			echo '<script language="javascript">';
			echo 'alert("Something went wrong! Please try again!")
			window.location.replace("edit_student_profile.php");
			</script>';
		}
	}

	
?>