<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "summer2023";

$conn = new mysqli($server, $username, $password);

if ($conn->connect_error) {
    die("ERROR: Could not connect " . $conn->connect_error);
} else {
    echo "Connected successfully.";
    echo "<br>";
}

$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully.";
    echo "<br>";
} else {
    echo "Error: Could not execute $sql. " . $conn->error;
    echo "<br>";
}

$conn->close();

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("ERROR: Could not connect to the database " . $conn->connect_error);
} else {
    echo "Connected to the database.";
    echo "<br>";
}

// Step 7: Create the table
$sql = "CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    ip VARCHAR(20) NOT NULL,
    url VARCHAR(100) NOT NULL,
    dob VARCHAR(10) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    info TEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'user' created successfully.";
    echo "<br>";
} else {
    echo "Error: Could not execute $sql. " . $conn->error;
    echo "<br>";
}

$conn->close();
?>
