<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Game</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="quiz-container">
        <div id="question-display">
            <?php
            include 'db_connect.php'; // Include your database connection file

            // SQL query to select a random question
            $sql = "SELECT * FROM columns ORDER BY RAND() LIMIT 1"; // Make sure your table name is correct
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo $row["question_text"];
                    // Add the correct answer data attribute
                    echo '<div id="answer-options" data-correct="'.$row["correct_answer"].'">';
                    echo "<button class='answer' data-answer='a'>" . $row["option_a"] . "</button>";
                    echo "<button class='answer' data-answer='b'>" . $row["option_b"] . "</button>";
                    echo "<button class='answer' data-answer='c'>" . $row["option_c"] . "</button>";
                    echo "<button class='answer' data-answer='d'>" . $row["option_d"] . "</button>";
                    echo '</div>';
                }
            } else {
                echo "0 questions found";
            }
            $conn->close();
            ?>
        </div>
        <div id="lifelines">
            <button class="lifeline" id="fifty-fifty">50:50</button>
            <button class="lifeline" id="hint">Hint</button>
            <button class="lifeline" id="pass">Skip</button>
        </div>
        <div id="score-tracker">Score: <span id="score">0</span></div>
    </div>
    <script src="script.js"></script>
</body>
</html>