<?php
include 'db.php'; // Make sure this connects to your MySQL database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validate required fields
    if ($name && $email && $message) {
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        $stmt->execute();
        $stmt->close();
        echo "Message submitted successfully!";
        header("Location: contact.html");
exit;

    } else {
        echo "Please fill in all required fields (name, email, message).";
    }
}
?>
