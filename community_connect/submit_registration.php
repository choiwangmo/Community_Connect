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
$phone = $_POST["phone"];
$event = $_POST["event"];
$comments = $_POST["comments"];

// INSERT DATA INTO event_registrations
$sql = "INSERT INTO event_registrations (full_name, email, phone, event_name, comments) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $phone, $event, $comments);

if ($stmt->execute()) {
    echo "✅ Registration successful!";
} else {
    echo "❌ Failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
