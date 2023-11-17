<?php
include 'db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $question = $_POST['question'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $correct_answer = $_POST['correct_answer'];
    $hint = $_POST['hint'];

    // Insert data into database
    // Create a prepared statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO columns (question_text, option_a, option_b, option_c, option_d, correct_answer, hint) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $question, $option_a, $option_b, $option_c, $option_d, $correct_answer, $hint);

    // Execute the prepared statement
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect or display a success message
    echo "Question added successfully!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Add Question</title>
    <!-- Include any additional CSS or JS here -->
</head>
<body>
    <h2>Add a New Question</h2>
    <form method="POST" action="admin.php">
        <label>Question:</label>
        <input type="text" name="question" required><br>

        <label>Option A:</label>
        <input type="text" name="option_a" required><br>

        <label>Option B:</label>
        <input type="text" name="option_b" required><br>

        <label>Option C:</label>
        <input type="text" name="option_c" required><br>

        <label>Option D:</label>
        <input type="text" name="option_d" required><br>

        <label>Correct Answer:</label>
        <input type="text" name="correct_answer" required><br>

        <label>Hint (Optional):</label>
        <input type="text" name="hint"><br>

        <input type="submit" value="Add Question">
    </form>
</body>
</html>
