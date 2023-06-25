<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="shortcut icon" href="images/transparent-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
</head>

<body>
    <!--header-->
    <div class="outercontainer-nav">
        <div class="container-logo">
            <a href="Student.php"><img src="images/transparent-logo.png" alt="Logo" id="img-logo"></a>
            <p class="title">Students' Practical Training Management System</p>
        </div>

        <div class="dropdown">
            <button class="dropbtn-logo"><img src="images/student-girl.png" alt="Student girl logo" width="400px">
                <p>STUDENT</p>
            </button>
            <div class="dropdown-content">
                <a href="Student/edit_student_profile.php">Profile</a>
                <a href="login.html">Log out</a>
            </div>
        </div>
    </div>


    <nav class="stroke">
        <ul>
            <li><a href="Student.php">Home</a></li>
            <li><a href="Student/application_homepage.php">Apply</a></li>
            <li><a href="Student/report_homepage.php">Report</a></li>
        </ul>
    </nav>
    <!--end of header-->

    <div class="industry-background">
        <img src="images/background-img1.jpg" style="width: 100%;">
        <div class="homepage-caption">
            <p class="cCaption">Best Practical Training Management System</p>
            <p class="cCaption2"><i>"RECOMENDED BY MANY INDUSTRY LEADERS"</i></p>
            <a href="Student/add_practical_training.php"><button class="button">Apply Now!</button></a>
        </div>
    </div>

    <br> <br>


    <div class="container-purpose-with-img">
        <div class="our-purpose-desc">
            <h3>Our Purpose</h3>
            <h1 style="color: rgb(26, 26, 26);">Students' Practical Training Management System</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt recusandae enim earum expedita, obcaecati mollitia amet adipisci fugiat animi? Maiores unde, nisi molestiae ex quod adipisci ipsam quisquam veniam dolore!
                Quidem saepe dignissimos suscipit eaque, quis debitis animi molestiae dignissimos ut esse maxime!
            </p>
        </div>
        <img src="images/work1.jpg" alt="civil-engineer-work" style="height: 270px;">
    </div>

    <br> <br>

    <div class="container-promise-with-img">
        <img src="images/work2.jpg" alt="programmer-work" style="height: 265px;">

        <div class="our-promise-desc">
            <h3>Our Promise</h3>
            <h1 style="color: rgb(26, 26, 26);">Reliable and Efficient System</h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt recusandae enim earum expedita, obcaecati mollitia amet adipisci fugiat animi? Maiores unde, nisi molestiae ex quod adipisci ipsam quisquam veniam dolore! Quidem saepe dignissimos suscipit eaque, quis debitis animi molestiae dignissimos ut esse maxime!</p>
        </div>
    </div>

    <br> <br> <br>

    <?php include 'includes/footer.php' ?>
</body>

</html>