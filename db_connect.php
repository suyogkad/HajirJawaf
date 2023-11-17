<?php
$servername = "localhost";
$username = "root"; // default username for localhost
$password = ""; // default password for localhost is empty
$dbname = "hajirjawaf_ques";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>