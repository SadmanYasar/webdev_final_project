<?php
session_start();
include "mysqli_connect.php";

if (isset($_POST['submit'])) {
    $id = $_SESSION['userid'];
    $name = $_POST['name'];

    // Check if the CV file is uploaded successfully
    if ($_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        // Get the uploaded CV file details
        $cv = $_FILES['cv'];
        $cv_name = $cv['name'];
        $cv_tmp_name = $cv['tmp_name'];

        // Move the uploaded CV file to the desired location
        $target_directory = "cv_uploads/";
        $cv_path = $target_directory . $cv_name;
        move_uploaded_file($cv_tmp_name, $cv_path);

        // Insert CV details into the database
        $cv_insert_query = "INSERT INTO studentcv (student_name, file_name, file_path) VALUES ('$name', '$cv_name', '$cv_path')";
        $cv_result = mysqli_query($conn, $cv_insert_query);

        if ($cv_result) {
            header('location: application_homepage.php');

        } else {
            echo "Failed to upload CV!";
        }
    }
}
?>
