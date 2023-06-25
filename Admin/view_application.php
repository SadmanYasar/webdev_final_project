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

    <?php
        //session_start();
        include "../config.php";
        include('Admin.php');
        include('../Coordinator/functionCoordinator.php');

        $userid=$_GET['userid'];
        $applicationid=$_GET['appid'];

        echo "<h1 style='text-align: center; margin-top: 50px;'>View Student's Application Information</h1>";
        echo '<div class="outer-container">';
            echo '<div class="entire-table">';
                displayFullApplication($userid, $applicationid);

                echo '<div style="display: inline-flex; margin-left: 180px;">
                    <button class="insert-button" style="margin-left: 400px; display: width: 100px; font-size:18px;" onclick="history.back()">Go Back</button>
                </div>';
                echo '<br> <br>';
            echo '</div>';

        echo '</div>';
    ?>

<?php include '../includes/footer.php' ?>

</body>
</html>