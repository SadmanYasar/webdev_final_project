<!DOCTYPE html>
<html>

<head>
   <title>Edit Profile</title>
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

   <h1 style="text-align: center; margin-top: 50px;">Coordinator Profile</h1>

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
   include "Connection.php";
   include "functionCoordinator.php";
   $username=$_SESSION['username'];
   $q = "SELECT * FROM login where username='$username'";
   if($result=mysqli_query($conn,$q)){
      $row=mysqli_fetch_array($result);
      $id=$row['fk_userid'];
      $_SESSION['userid']=$id;
      $q1 = "SELECT * FROM users where userid=$id";
      $result1=mysqli_query($conn,$q1);
      $row1=mysqli_fetch_array($result1);

         echo '<div class="outer-user-table">';
         echo '<form method="post" action="UpdateProfile.php">

         <div class="user-table">

            <label><span class="profile">Full Name:</span>
            <input type="text" name="name" required value="' . $row1['name'] . '"></label><br>

            <label><span class="profile">Username:</span>
            <input type="text" name="username" required value="' . $row['username'] . '"></label><br>
         
            <label><span class="profile">Age:</span>
            <input type="number" name="Age" min="1" max="200" required value="' . $row1['age'] . '"></label><br>

            <label><span class="profile">Address:</span>
            <input type="text" name="Address" required value="' . $row1['address'] . '"></label><br>

            <label><span class="profile">Phone Number:</span>
            <input type="text" name="Phone" required value="' . $row1['phone'] . '"></label><br>
         
            <label><span class="profile">Email:</span>
            <input type="email" name="email" required value="' . $row1['email'] . '"></label><br>

            <label><span class="profile">Password:</span>
            <input type="password" name="Password" required value="' . $row['password'] . '"></label><br>
            
            <br>
            <label class="button-profile">
               <input class="button-profile-update" type="submit" name="edit" value="Submit"/>
            </label>';
   }
   ?>
   </div>

   </form>
   </div>
   <?php include '../includes/footer.php' ?>
</body>

</html>