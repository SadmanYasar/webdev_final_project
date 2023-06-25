<?php 
session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Welcome <?php echo $_SESSION['USER'];  ?></h1>
	Click here to <a href="login.html" action="Logout">Logout</a>

</body>
</html>