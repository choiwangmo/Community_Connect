<?php
// CONNECT TO DATABASE
$conn = new mysqli("localhost", "root", "", "community_connect");

// CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// GET FORM DATA
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// INSERT INTO feedback_messages
$sql = "INSERT INTO feedback_messages (full_name, email, message) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "✅ Feedback submitted successfully!";
} else {
    echo "❌ Failed to submit feedback: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
