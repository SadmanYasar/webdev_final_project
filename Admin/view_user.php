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
<?php
include "../config.php";
include('Admin.php');
if((isset($_GET['id']))){
    $id=$_GET['id'];
} else if ((isset($_POST['id']))){
    $id=$_POST['id'];
}else{
    echo '<p>This page has been accessed in error.</p>';
    include('../footer.html');
    exit();
}

$q1="SELECT * FROM users WHERE userid=$id";
$q2="SELECT * FROM login WHERE fk_userid=$id";

if($r=mysqli_query($conn,$q1)){
    $r2=mysqli_query($conn,$q2);
    if(mysqli_num_rows($r)==1){
        $row=mysqli_fetch_array($r);
        $row2=mysqli_fetch_array($r2);

        echo '<h1 style="text-align: center; margin-top: 50px;">User Information</h1>';
        
        echo '<div class="outer-user-table">
        <div class="user-table">

        <label><span class="profile"> User ID: </span>'. $row['userid'].'</label><br>
        
        <label><span class="profile"> Full Name: </span>'. $row['name'].'</label><br>
        
        <label><span class="profile"> Age: </span>'. $row['age'].'</label><br>
        
        <label><span class="profile"> Phone Number: </span>'. $row['phone'].'</label><br>
        
        <label><span class="profile"> Email: </span>'. $row['email'].'</label><br>
        
        <label><span class="profile"> Address: </span>'. $row['address'].'</label><br>
        
        <label><span class="profile"> Username: </span>'. $row2['username'].'</label><br>
        
        <label><span class="profile"> Password: </span>'. $row2['password'].'</label><br>';
        
        if($row2['userlevel']==1){
            echo "<label><span class='profile'> Role: Admin</label><br>";
        } else if ($row2['userlevel']==2){
            echo "<label><span class='profile'> Role: Student</label><br>";
        } else if ($row2['userlevel']==3){
            echo "<label><span class='profile'> Role: Student</label><br>";
        }

        echo '<div style="display: flex; justify-content:center; align-items: center;">';
        echo '<button class="insert-button" style="align:" onclick="history.back()">Go Back</button>';
        echo '<br>';
        echo '</div>';

        echo '</div> </div>';
    }
}
include ('../includes/footer.php');
?>