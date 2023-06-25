<?php
// Connect to MySQL server
$connection = mysqli_connect("localhost", "root", "", "training");
if (!$connection) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Retrieve form data
$name = $_POST['name'];
$cv = $_FILES['cv'];

// Check if a file was uploaded successfully
if ($cv['error'] === UPLOAD_ERR_OK) {
    // Get the temporary file path
    $tempFilePath = $cv['tmp_name'];

    // Read the file content
    $cvContent = addslashes(file_get_contents($tempFilePath));

    // Insert lecturer data into the database
    $query = "INSERT INTO studentcv (name, cv) VALUES ('$name', '$cvContent')";
    if (mysqli_query($connection, $query)) {
        echo "CV uploaded successfully.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    echo "Error uploading the CV: " . $cv['error'];
}

// Close the database connection
mysqli_close($connection);
?>
