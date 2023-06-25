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

$con=mysqli_connect('localhost','root','','training') ;
include ('Admin.php');

echo '<h1 style="text-align: center; margin-top: 50px;">Delete User</h1>';


if ( (isset($_GET['id']))) { 
	$id = $_GET['id'];

} elseif ( (isset($_POST['id']))) { 
	$id = $_POST['id'];
} else { 
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('../footer.html'); 
	exit();
}

if (isset($_POST['submitted'])) {
	if ($_POST['sure'] == 'Yes') { 

		$q = "DELETE FROM users WHERE userid='$id' LIMIT 1";	
        if($r = mysqli_query($con, $q)){
		    if (mysqli_affected_rows($con) == 1) {
			    echo '<p style="margin-left: 100px;">The user record has been deleted.</p>';
                echo '<span align="center"><p><button class="button-training1" onclick="goBackTwoPages()">Go Back</button></p><br /></span>';
                echo '<script>
                function goBackTwoPages() {
                history.go(-2);
                }
                </script>';

                
		    } else {
			    echo '<p style="margin-left: 100px;" class="error">The record could not be deleted due to a system error.</p>'; 
                echo '<span align=center><p><button class="button-training1" onclick="history.back()">Go Back</button></p><br /></span>';
			    echo '<p style="margin-left: 100px;">' . mysqli_error($con) . '<br />Query: ' . $q . '</p>';   
            }
        }
	} else { 
		echo '<p>The user has NOT been deleted.</p>';	
	}

} else {
	$q = "SELECT * FROM users WHERE userid='$id'";

    if($r = mysqli_query($con, $q)){
        if (mysqli_num_rows($r) == 1) { 
            $row = mysqli_fetch_array ($r);

            echo '<div class="outer-user-table">';
            echo '<form action="delete_user.php" method="post"
            <div class="user-table">
                  <br><h3>UserID:  ' . $row['userid'] . '</h3>
                  <h3>Name:  ' . $row['name'] . '</h3>
                  <p>Are you sure you want to delete this user?<br /><br />
                  <input type="radio" name="sure" value="Yes" /> Yes 
                  <input type="radio" name="sure" value="No" checked="checked" /> No</p>
                  
                  <div style="margin-left: 100px;">
                  <input class="button-training1" type="submit" name="submit" value="Submit" />
                  <input type="hidden" name="submitted" value="TRUE" />
                  <input type="hidden" name="id" value="' . $id . '" />
                  </div>
                  
                  
                  </div>
                  </form>
                  </div>';
        
        } else { 
            echo '<p class="error">This page has been accessed in error.</p>';
        }
    }

} 

mysqli_close($con);
		
include ('../includes/footer.php');
?>
    
</body>
</html>
