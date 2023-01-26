<?php
$servername = "localhost";
$databaseName = "web_project";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>