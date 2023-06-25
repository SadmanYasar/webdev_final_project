<html>

<head>
   <title>Application Homepage</title>
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

    <?php
        //session_start();
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
        include ('Connection.php');
        include('functionCoordinator.php');

        $_SESSION['userid']=$_GET['userid'];
        $_SESSION['appid']=$_GET['appid'];

        echo "<h1 style='text-align: center; margin-top: 50px;'>View Student's Application Information</h1>";
        echo '<div class="outer-container">';
            echo '<div class="entire-table">';
                displayFullApplication($_SESSION['userid'], $_SESSION['appid']);

                echo "<form class='inline' method='post' action='UpdateApplication.php'>";
                    echo "<input class='button-training1' type='submit' name='approve' value='Approve'>";
                    echo "&nbsp &nbsp  &nbsp  &nbsp";
                    echo "<input class='button-training1' type='submit' name='reject' value='Reject'>";
                echo "</form>";
                echo '<br> <br>';
            echo '</div>';

        echo '</div>';
    ?>

<?php include '../includes/footer.php' ?>

</body>
</html>