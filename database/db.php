<?php
// Define the server name (usually 'localhost' for local development).
$servername = "localhost";

// Specify the name of the database you want to connect to.
// This should match the database name you've created in PHPMyAdmin.
$dbname = "khabarnama";

// Provide the MySQL database username (commonly 'root' for local development).
$username = "root";

// Set the password for the database user (typically empty for local setups).
$password = "";

// Attempt to establish a connection to the MySQL database using the provided credentials.
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful.
if (!$conn) {
    // If the connection fails, display an error message and terminate the script.
    die("Connection failed: " . mysqli_connect_error());
}

// If the connection is successful, display a success message.
// echo "Connected successfully";
?>

    