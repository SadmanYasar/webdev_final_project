<?php
// ob_start();
// session_start();
// if (isset($_SESSION['LEVEL'])) {
//     // Destroy the session
   
//     // Redirect the user to the login page or any other desired page
   
// }
// else 
// {
//     header("Location: ../login.html");
//     exit();
// }
// echo  $_SESSION['LEVEL'];
// echo $_SESSION['userid'];
// echo $_SESSION['username'];
?>

<html>

<head>
    <link rel="shortcut icon" href="../images/transparent-logo.png" type="image/x-icon">
</head>

<body>
    <style>
        p {
            text-align: center;
        }
    </style>
    <?php
    include('Admin.php');
    ?>

    <!--background-->
    <div class="industry-background">
        <img src="../images/background-img3.jpg" style="width: 100%;">
        <div class="homepage-caption">
            <p class="cCaption">Best Practical Training Management System</p>
            <p class="cCaption2"><i>"RECOMENDED BY MANY INDUSTRY LEADERS"</i></p>
        </div>
    </div>

    <form action="search_user.php" method="post">
        <!--this one need? bcuz dh close tag-->
        <div class="admin-links">
            <b> <a href="View all user.php"><label class="ad-homepage-btn">View All User</label></a>
                <a href="view_validate_report.php"><label class="ad-homepage-btn">View Student Applications</label></a>
                <a href="view student application.php"><label class="ad-homepage-btn">View Student Report</label></a> </b>
        </div>
    </form>
    <br> <br>
    <?php include '../includes/footer.php' ?>
</body>

</html>

