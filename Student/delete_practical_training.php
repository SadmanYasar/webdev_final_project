<?php
	session_start();
	include "mysqli_connect.php";

	$id = $_SESSION['userid'];
	$_SESSION['t_id'] = $_GET['t_id'];
	$t_id = $_SESSION['t_id'];

	$query = "DELETE FROM practical_training WHERE fk_userid = '$id' AND applicationid = '$t_id'";
	$query2 = "DELETE FROM company WHERE fk_applicationid = '$t_id'";
	$query3 = "DELETE FROM user_detail WHERE fk_applicationid = '$t_id'";
	$result = mysqli_query($conn, $query) or die(mysqli_connect_error());
	$result2 = mysqli_query($conn, $query2) or die(mysqli_connect_error());
	$result3 = mysqli_query($conn, $query3) or die(mysqli_connect_error());
	if($result && $result2 && $result3) {
		header('location:application_homepage.php');
	}
	else {
		header('location:edit_practical_training.php');
	}

?>