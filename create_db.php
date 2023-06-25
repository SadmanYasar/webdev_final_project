<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('Could not connect: ' . mysqli_connect_error());
}
// create a database
if (mysqli_query($con,"CREATE DATABASE training"))
{
echo "Database created";
}
else
{
echo "Error creating database: " . mysqli_connect_error();
}
mysqli_close($con);
?>
