<!DOCTYPE html>
<html>

<head>
	<title>Search User Profile</title>
	<link rel="shortcut icon" href="../images/transparent-logo.png" type="image/x-icon">
	<link rel="stylesheet" href="../style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Cousine&family=Montserrat:ital,wght@0,400;1,200&display=swap" rel="stylesheet">
</head>

<body>
<?php
include('Admin.php');
include "../config.php";

if(isset($_POST['name'])){
    $name=$_POST['name'];
    $sql = "SELECT * FROM users WHERE name ='$name'";
   if($r = mysqli_query($conn, $sql)){
    if (mysqli_num_rows($r) == 1) { 
        $row=mysqli_fetch_array($r);
        $id=$row['userid'];
        $sql2 = "SELECT * FROM login WHERE fk_userid ='$id'";
        $r2 = mysqli_query($conn, $sql2);
        $row2=mysqli_fetch_array($r2);

        echo '<h1 style="text-align: center; margin-top: 50px;">User Information</h1>';
        
        echo '<div class="outer-user-table">
        <div class="user-table">
        <label>
			<span class="profile">User ID: </span>'. $row['userid'].'</label><br>
        <label>
			<span class="profile">Full Name: </span>'. $row['name'].'</label><br>
        <label>
			<span class="profile">Age: </span>'. $row['age'].'</label><br>
        <label>
			<span class="profile">Phone Number: </span>'. $row['phone'].'</label><br>
        <label>
			<span class="profile">Email: </span>'. $row['email'].'</label><br>
        <label>
			<span class="profile">Address: </span>'. $row['address'].'</label><br>
        <label>
			<span class="profile">Username: </span>'. $row2['username'].'</label><br>
        <label>
			<span class="profile">Password: </span>'. $row2['password'].'</label><br>';
        
       if($row2['userlevel']==1){
            echo "<label><span class='profile'>Role: Admin</span></label><br>";
        } else if ($row2['userlevel']==2){
            echo "<label><span class='profile'>Role: Student</span></label><br>";
        } else if ($row2['userlevel']==3){
            echo "<label><span class='profile'>Role: Student</span></label><br>";
        }
        echo '<div style="display: flex; justify-content:center; align-items: center;">';
            echo '<button class="insert-button" style="align:" onclick="history.back()">Go Back</button>';
            echo '<br>';
        echo '</div>';
    }else{
        header("Location: View all user.php");
    }
   }
}
echo '</div>
</form>
</div>';

mysqli_close($conn);
include ('../includes/footer.php');

?>

</body>
</html>