<html>

<head>
    <title>Practical Training Application</title>
    <link rel="shortcut icon" href="../images/transparent-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
</head>

<?php
include "mysqli_connect.php";
ob_start();
session_start();
if (isset($_SESSION['LEVEL'])) {
    // Destroy the session

    // Redirect the user to the login page or any other desired page

} else {
    header("Location: ../login.html");
    exit();
}
//session_start();
$id = $_SESSION['userid'];
$query = mysqli_query($conn, "SELECT * FROM users where userid = '$id'") or die(mysqli_connect_error());
$row = mysqli_fetch_array($query);
?>

<body>
    <!--header-->
    <div class="outercontainer-nav">
        <div class="container-logo">
            <a href="../Student.php"><img src="../images/transparent-logo.png" alt="Logo" id="img-logo"></a>
            <p class="title">Students' Practical Training Management System</p>
        </div>

        <div class="dropdown">
            <button class="dropbtn-logo"><img src="../images/student-girl.png" alt="Student girl logo" width="400px">
                <p>STUDENT</p>
            </button>
            <div class="dropdown-content">
                <a href="edit_student_profile.php">Profile</a>
                <a href="../Logout.php?logout">Log out</a>
            </div>
        </div>
    </div>

    <nav class="stroke">
        <ul>
            <li><a href="../Student.php">Home</a></li>
            <li><a href="application_homepage.php">Apply</a></li>
            <li><a href="report_homepage.php">Report</a></li>
        </ul>
    </nav>
    <!--end of header-->

    <h1 style="text-align: center; margin-top: 50px;">Upload CV</h1>
    <label style="display: block; text-align: end;">
        <b>Date :</b>
        <input id="remove-border" style="font-size:15px; font-weight: bold;" type="text" name="applicationdate" value="<?php date_default_timezone_set("Asia/Kuala_Lumpur");
        echo date("d-M-Y"); ?>" readonly />
    </label>


    <div class="outer-container">
        <form method="post" action="handle_upload_cv.php" enctype="multipart/form-data">
            <div class="entire-table">
                <div class="tableA">
                    <h2>CV Information</h2>
                    <table class="tablePracticalTraining">
                        <tr>
                            <td id="num">1.</td>
                            <td class="question">Applicant's Name</td>
                            <td><input id="remove-border" type="text" name="name" value="<?php echo $row['name']; ?>" readonly /></td>

                        </tr>
                        <tr>
                            <td id="num">2.</td>
                            <td class="question">CV</td>
                            <td><input type="file" id="cv" name="cv" accept=".pdf,.png" required></td>
                        </tr>
                    </table>
                </div>

                
                <label>
                    <input class="button-training" type="submit" name="submit" value="Submit" onclick="return Validate()"/>
                </label>

                <script type="text/javascript">
                    function Validate() {
                        if(check1() === true && check2() === true) {
                            return true;
                        } 
                        else if (check1() === true && check2() === false) {
                            alert("The end date is invalid!");
                            return false;
                        }
                        else if (check1() === false && check2() === true) {
                            alert("The start date is invalid!");
                            return false;
                        }
                        else {
                            alert("The start and end date is invalid!");
                            return false;
                        }
                    }

                    function check1() {
                        var Startdate = new Date(document.getElementById('start_date').value);
                        var now = new Date();
                        if(now > Startdate) {
                            return false;
                        }
                        else {
                            return true;
                        }
                    }

                    function check2() {
                        var Startdate = new Date(document.getElementById('start_date').value);
                        var Enddate = new Date(document.getElementById('end_date').value);
                        if(Enddate < Startdate) {
                            return false;
                        }
                        else {
                            return true;
                        }
                    }

                    var check1 = function() {
                        var Startdate = new Date(document.getElementById('start_date').value);
                        var now = new Date();
                        if(now > Startdate) {
                            document.getElementById('message1').style.color = 'red';
                            document.getElementById('message1').innerHTML = 'Start date should be later than application date.';
                            return false;
                        }
                        else {
                            return true;
                        }
                    }

                    var check2 = function() {
                        var Startdate = new Date(document.getElementById('start_date').value);
                        var Enddate = new Date(document.getElementById('end_date').value);
                        if(Enddate < Startdate) {
                            document.getElementById('message2').style.color = 'red';
                            document.getElementById('message2').innerHTML = 'End date should be later than start date.';
                            return false;
                        }
                        else {
                            return true;
                        }
                    }
                </script>
            </div>
        </form>
    </div>
    <?php include '../includes/footer.php' ?>
</body>

</html>