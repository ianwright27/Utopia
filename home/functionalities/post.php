<?php
require_once('../../db.php');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all necessary data is set and not empty
    if (
        isset($_POST['expiry_date']) &&
        isset($_POST['choices']) &&
        isset($_POST['poll_title']) &&
        isset($_POST['session_user_id']) &&
        isset($_POST['post_type'])
    ) {
        // Extract data from POST variables
        $expiryDate = $_POST['expiry_date'];
        $choices = $_POST['choices'];
        $pollTitle = $_POST['poll_title'];
        $userId = $_POST['session_user_id'];
        $postType = $_POST['post_type'];

        // Insert poll data into polls table
        $pollId = insertPoll($expiryDate);

        // Insert poll choices into poll_choices table
        insertPollChoices($pollId, $choices);

        // Insert post data into posts table
        $postId = insertPost($pollTitle, $userId, $postType, $pollId);

        // Insert post stats into post_stats table
        insertPostStats($postId);

        // Return success message
        echo json_encode(array("message" => "Post added successfully", "postId" => $postId));
        header('Location: ../?post_success');
    } else {
        // If any necessary data is missing, return an error message
        echo json_encode(array("error" => "Missing required data"));
    }
} else {
    // If the request method is not POST, return an error message
    echo json_encode(array("error" => "Invalid request method"));
}

// Function to insert poll data into polls table
function insertPoll($expiryDate)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO polls (expiry_date) VALUES (?)");
    $stmt->bind_param("s", $expiryDate);
    $stmt->execute();
    return $stmt->insert_id;
}

// Function to insert poll choices into poll_choices table
function insertPollChoices($pollId, $choices)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO poll_choices (poll_id, choice) VALUES (?, ?)");
    $stmt->bind_param("is", $pollId, $choiceText);
    foreach ($choices as $choice) {
        $choiceText = $choice;
        $stmt->execute();
    }
    $stmt->close();
}

// Function to insert post data into posts table
function insertPost($pollTitle, $userId, $postType, $pollId)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO posts (post_title, user_id, post_type, poll_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sisi", $pollTitle, $userId, $postType, $pollId);
    $stmt->execute();
    return $stmt->insert_id;
}

// Function to insert post stats into post_stats table
function insertPostStats($postId)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO post_stats (post_id, views, likes, reposts, comments, saves, shares) VALUES (?, 0, 0, 0, 0, 0, 0)");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $stmt->close();
}
