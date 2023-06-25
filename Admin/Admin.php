<?php
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
// echo  $_SESSION['LEVEL'];
// echo $_SESSION['userid'];
// echo $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
</head>

<body>
    <!--header-->
    <div class="outercontainer-nav">
        <div class="container-logo">
            <a href="Admin_homepage.php"><img src="../images/transparent-logo.png" alt="Logo" id="img-logo"></a>
            <p class="title">Students' Practical Training Management System</p>
        </div>
        
        <div class="dropdown">
            <button class="dropbtn-logo"><img src="../images/admin.png" alt="Student girl logo" width="400px">
                <p>ADMIN</p>
            </button>
            <div class="dropdown-content">
                <a href="edit_profile.php">Profile</a> <!--here need to add link-->
                <a href="../Logout.php?logout" >Log out</a>
            </div>
        </div>
    </div>

    <nav class="stroke">
        <ul>
            <li><a href="Admin_homepage.php">Home</a></li>
            <li><a href="View all user.php">User Management</a></li>
            <li><a href="view_validate_report.php">Training Management</a></li>
            <li><a href="view student application.php">Report</a></li>
        </ul>
    </nav>

    </body>
</html>