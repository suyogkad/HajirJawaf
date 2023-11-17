document.addEventListener('DOMContentLoaded', function() {

    // Add event listeners to lifeline buttons
    document.getElementById('fifty-fifty').addEventListener('click', useFiftyFifty);
    document.getElementById('hint').addEventListener('click', useHint);
    document.getElementById('pass').addEventListener('click', useSkip);

    var answerButtons = document.querySelectorAll('.answer');
    answerButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            validateAnswer(this);
        });
    });
});

function validateAnswer(selectedButton) {
    // Assuming the correct answer is stored in a data attribute in the #answer-options div
    var correctAnswer = document.getElementById('answer-options').getAttribute('data-correct');
    var userAnswer = selectedButton.textContent;
    var isCorrect = (selectedButton.getAttribute('data-answer') === correctAnswer);

    // Highlight the selected answer
    selectedButton.style.backgroundColor = isCorrect ? 'green' : 'red';

    // Highlight the correct answer if the user is wrong
    if (!isCorrect) {
        document.querySelector('[data-answer="' + correctAnswer + '"]').style.backgroundColor = 'green';
    }

    // Update score if the answer is correct
    if (isCorrect) {
        var score = parseInt(document.getElementById('score').textContent);
        document.getElementById('score').textContent = score + 1;
    }

    // Disable all buttons after selection
    disableAnswerButtons();

    // Move to the next question after a delay
    setTimeout(function() {
        location.reload(); // Reload the page for a new question
    }, 2000); // Delay for 2 seconds
}

function disableAnswerButtons() {
    var answerButtons = document.querySelectorAll('.answer');
    answerButtons.forEach(function(button) {
        button.disabled = true;
    });
}

function useFiftyFifty() {
    var correctAnswer = document.getElementById('answer-options').getAttribute('data-correct');
    var answerButtons = document.querySelectorAll('.answer');
    var wrongAnswers = Array.from(answerButtons).filter(button => button.getAttribute('data-answer') !== correctAnswer);
    
    // Randomly hide two wrong answers
    var hiddenCount = 0;
    while (hiddenCount < 2 && wrongAnswers.length > 0) {
        var randomIndex = Math.floor(Math.random() * wrongAnswers.length);
        wrongAnswers[randomIndex].style.display = 'none'; // Hide the button
        wrongAnswers.splice(randomIndex, 1);
        hiddenCount++;
    }

    // Disable the 50:50 button after use
    document.getElementById('fifty-fifty').disabled = true;
}

function useHint() {
    // Fetch the hint from the database and display it
    // This requires AJAX request or similar method to retrieve data
    // For now, we'll simulate this with a placeholder text
    var hintPlaceholder = "This is where the hint will be displayed."; // Replace with AJAX call to fetch the hint
    alert(hintPlaceholder);

    // Disable the Hint button after use
    document.getElementById('hint').disabled = true;
}

function useSkip() {
    // Logic to load the next question
    // This may require refreshing the page or an AJAX call to fetch a new question
    location.reload(); // Simple way to reload the page for a new question

    // Note: Consider implementing a method to fetch and display a new question without reloading the page.
}
