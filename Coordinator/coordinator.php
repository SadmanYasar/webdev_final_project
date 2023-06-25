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
    <title>Coordinator</title>
    <link rel="shortcut icon" href="../images/transparent-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
</head>

<body>
    <!--header-->
    <div class="outercontainer-nav">
        <div class="container-logo">
            <a href="coordinator.php"><img src="../images/transparent-logo.png" alt="Logo" id="img-logo"></a>
            <p class="title">Students' Practical Training Management System</p>
        </div>

        <div class="dropdown">
            <button class="dropbtn-logo"><img src="../images/coordinator.png" alt="Coordinator logo" width="400px">
                <p>COORDINATOR</p>
            </button>
            <div class="dropdown-content">
                <a href="EditProfile_Form.php">Profile</a>
                <a href="../Logout.php?logout">Log out</a>
            </div>
        </div>
    </div>
    <nav class="stroke">
        <ul>
            <li><a href="coordinator.php">Home</a></li>
            <li><a href="ViewApplicationList.php">Validate</a></li>
            <li><a href="ViewSortedReport.php">Report</a></li>
        </ul>
    </nav>
    <!--end of header-->

    <div class="industry-background">
        <img src="../images/background-img2.jpg" style="width: 100%;">
        <div class="homepage-caption">
            <p class="cCaption">Best Practical Training Management System</p>
            <p class="cCaption2"><i>"RECOMENDED BY MANY INDUSTRY LEADERS"</i></p>
        </div>
    </div>

    <br> <br>

    <div class="coordinator-links">
        <b><a href="ViewApplicationList.php"><label class="co-homepage-btn">View Application List</label></a></b>
        <b><a href="ViewSortedReport.php"><label class="co-homepage-btn">View Sorted Report</label></a></b>
        <b><a href="ViewSortedSubmission.php"><label class="co-homepage-btn">View Sorted Submission</label></a></b>
    </div>

    <form action="SearchingUsers.php" method="post">
        <div class="co-homepage-table">
            <span class="profile">Search Student's Profile:</span>
            <input type="text" class="co-homepage-input" name="search" />
            <br>

            <span class="profile">Column: </span>
            <select class="select" name="column">
                <option value="name">Name</option>
                <option value="phone">Phone Number</option>
                <option value="userid">User ID</option>
            </select>
            <br>
            <input class="co-homepage-submit" type="submit" value="Submit"> <!--added value-->
    </form>

    <br> <br>

    <form action="SearchingRecord.php" method="post">
        <span class="profile">Search Student's Practical Training Report:</span>
        <input class="co-homepage-input" type="text" name="search"><br>

        <span class="profile">Column:</span>
        <select class="select" name="column">
            <option value="applicationid">Application ID</option>
    <option value="applicationstatus">Application Status</option>
    <option value="fk_userid">User ID</option>
    <option value="applicationtitle">Application Title</option>
    <option value="applicationdate">Application Date</option>
        </select><br>
        <input class="co-homepage-submit" type="submit" value="Submit"> <!--added value-->
    </form>
    </div>

    <?php include("../includes/footer.php") ?>
</body>

</html>