<?php
// db.php
$servername = "localhost";
$username = "roott";
$password = "1234"; // Replace with your MySQL root password if set
$dbname = "todo_app";

$conn = new mysqli("localhost", "roott", "1234", "todo_app");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
