<?php
	session_start();
	include "mysqli_connect.php";
	if(isset($_POST['submit'])) {
		$id = $_SESSION['userid'];
		$t_id = $_SESSION['t_id'];
		$application_title = $_POST['company_name']. "/" .$_POST['job_title'];
		$application_date = date("d-M-Y");
		$nationality = $_POST['nationality'];
		$matric_number = $_POST['matric_number'];
		$company_name = $_POST['company_name'];
		$company_contactno = $_POST['phone_number'];
		$company_email = $_POST['company_email'];
		$dep_name = $_POST['dep_name'];
		$job_title = $_POST['job_title'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$status = "submitted";

		$query = "UPDATE practical_training SET 
		applicationtitle = '$application_title', 
		applicationdate = '$application_date',
		applicationstatus = '$status' 
		WHERE fk_userid = '$id' AND applicationid = '$t_id'";

		$result = mysqli_query($conn, $query) or die(mysqli_connect_error());

		$query2 = "UPDATE company SET 
		companyname = '$company_name', 
		companycontactno = '$company_contactno', 
		companyemail = '$company_email', 
		department = '$dep_name', 
		jobtitle = '$job_title', 
		startdate = '$start_date', 
		enddate = '$end_date'  
		WHERE fk_applicationid = '$t_id'";

		$result2 = mysqli_query($conn, $query2) or die(mysqli_connect_error());

		$query3 = "UPDATE user_detail SET 
		matricnumber = '$matric_number', 
		nationality = '$nationality' 
		WHERE fk_applicationid = '$t_id'";

		$result3 = mysqli_query($conn, $query3) or die(mysqli_connect_error());

		if($result && $result2 && $result3) {
			header('location:application_homepage.php');
		}
		else {
			header('location:edit_practical_training.php');
		}
	}
?>