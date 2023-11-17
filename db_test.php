<?php
// Including the database connection file
include 'db_connect.php';

// Test the connection
if ($conn->ping()) {
    echo "Database connection is successful!";
} else {
    echo "Database connection failed: " . $conn->error;
}

// Close the connection
$conn->close();
?>
