<?php
	session_start();
	include "mysqli_connect.php";

	if(isset($_POST['submit'])) {
		header('location:report_homepage.php');
	}
?>