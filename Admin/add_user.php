<html>

<head>
	<title>Add User</title>
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

echo '<h1 style="text-align: center; margin-top: 50px;">Add User</h1>';

if(isset($_POST['submitted'])){
    $errors = array();

    if(isset($_POST['username'])){
        $username=trim($_POST['username']);
    }else {
        $error[]='Please enter the username';
    }

    if(isset($_POST['password'])){
        $password=trim($_POST['password']);
    }else {
        $error[]='Please enter the password';
    }

    if(isset($_POST['level'])){
        $level=trim($_POST['level']);
    }else {
        $error[]='Please enter the level';
    }

    if(isset($_POST['email'])){
        $email=trim($_POST['email']);
    }else {
        $error[]='Please enter the email';
    }

    if(isset($_POST['name'])){
        $name=trim($_POST['name']);
    }else {
        $error[]='Please enter the name';
    }

    if(is_numeric($_POST['age'])){
        $age=trim($_POST['age']);
    }else {
        $error[]='Please enter the age';
    }

    if(isset($_POST['phone'])){
        $phone=trim($_POST['phone']);
    }else {
        $error[]='Please enter the phone';
    }

    if(isset($_POST['address'])){
        $address=trim($_POST['address']);
    }else {
        $error[]='Please enter the address';
    }

    if (empty($errors)) { 
		$q = "INSERT INTO users(email,name,age,phone,address)
              VALUES('$email','$name','$age','$phone','$address')";
		$r = mysqli_query ($conn, $q) or die(mysqli_connect_error());

        $id = mysqli_insert_id($conn);
  
        
        $q2 = "INSERT INTO login(username,password,userlevel,fk_userid)
               VALUES('$username','$password','$level','$id')";
        $r2 = mysqli_query ($conn, $q2) or die(mysqli_connect_error());
		if (mysqli_affected_rows($conn) == 1) { 
			echo '<p>The user has been added.</p>';					
		} else { 
			echo '<p class="error">Your submission could not be proceesed due to a system error. </p>'; 
			echo '<p>' . mysqli_error($conn) . '<br />Query: ' . $q . '</p>'; 
		}		
	} else {
	
		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { 
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
		
	} 
    mysqli_close($conn);
}
?>

<div class="outer-user-table">
<form method="post" action="add_user.php">
<div class="user-table">

    <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
    <span class="profile">Username: </span> <input class="blink" type="text" name="username" 
    value="<?php if (isset($_POST['username'])) echo htmlspecialchars($_POST['username']);?>"/></p>

    <span class="profile">Password: </span> <input class="blink" type="password" name="password" 
    value="<?php if (isset($_POST['password'])) echo htmlspecialchars($_POST['password']);?>"/></p>

    <span class="profile">Full Name: </span> <input class="blink" type="text" name="name" 
    value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']);?>"/></p>

    <span class="profile">Email: </span> <input class="blink" type="email" name="email" size="30" maxlength="60" 
    value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>"/></p>

    <span class="profile">Age: </span> <input class="blink" type="number" name="age" min="1" max="100" 
    value="<?php if (isset($_POST['age'])) echo htmlspecialchars($_POST['age']);?>"/></p>

    <span class="profile">Phone Number: </span> <input class="blink" type="text" name="phone" size="30" maxlength="60" 
    value="<?php if (isset($_POST['phone'])) echo htmlspecialchars($_POST['phone']);?>"/></p>

    <span class="profile">Address: </span> <input class="blink" type="text" name="address" 
    value="<?php if (isset($_POST['address'])) echo htmlspecialchars($_POST['address']);?>"/></p>

    <span class="profile">Level: </span> <input class="blink" type="text" name="level" min="1" max="3" 
    value="<?php if (isset($_POST['level'])) echo htmlspecialchars($_POST['level']);?>"/></p>

    <br>

    <label class="button-profile">
        <input class="button-profile-update" type="submit" name="submit" value="Submit" />
        <input type="hidden" name="submitted" value="TRUE" />
    </label>

</div>
</form>
</div>

</body>
</html>
<?php include '../includes/footer.php' ?>
