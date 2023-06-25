<?php
session_start();
include "mysqli_connect.php";

if (isset($_POST['submit'])) {
	$id = $_SESSION['userid'];
	$application_title = $_POST['company_name'] . "/" . $_POST['job_title'];
	$application_date = date("d-M-Y");
	$status = "submitted";
	$gender = $_POST['gender'];
	$nationality = $_POST['nationality'];
	$matric_number = $_POST['matric_number'];
	$company_name = $_POST['company_name'];
	$company_contactno = $_POST['phone_number'];
	$company_email = $_POST['company_email'];
	$dep_name = $_POST['dep_name'];
	$job_title = $_POST['job_title'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];




	$query = "INSERT INTO practical_training 
		(applicationtitle, applicationdate, applicationstatus, fk_userid) VALUES
		 ('$application_title', '$application_date', '$status', '$id')";
	$result = mysqli_query($conn, $query) or die(mysqli_connect_error());

	$application_id = mysqli_insert_id($conn);
	echo $application_id;

	$query2 = "INSERT INTO company 
		(companyname, companycontactno, companyemail, department, jobtitle, startdate, enddate, fk_applicationid) VALUES
		 ('$company_name', '$company_contactno', '$company_email', '$dep_name', '$job_title', '$start_date', '$end_date', '$application_id')";
	$result2 = mysqli_query($conn, $query2) or die(mysqli_connect_error());

	$query3 = "INSERT INTO user_detail 
		(gender, matricnumber, nationality, fk_applicationid) VALUES
		 ('$gender', '$matric_number', '$nationality', '$application_id')";
	$result3 = mysqli_query($conn, $query3) or die(mysqli_connect_error());

	if ($result && $result2 && $result3) {
		header('location: application_homepage.php');
	} else {
		header('location: add_practical_training.php');
	}

}
?>