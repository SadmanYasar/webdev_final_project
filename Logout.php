<?php
session_start();

// Check if the user clicked the logout button
if (isset($_GET['logout'])) {
    // Destroy the session
    session_destroy();
    // Redirect the user to the login page or any other desired page
    header("Location: login.html");
    exit();
}
else 
{
	echo "something went wrong :(";
}

// Rest of your code...
?>
