<?php
$conn = new mysqli("localhost", "root", "", "community_connect");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$sql = "INSERT INTO contact_messages (full_name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Message sent!";
} else {
    echo "Failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
