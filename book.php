<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name      = trim($_POST['name']);
    $email     = trim($_POST['email']);
    $check_in  = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $room_type = $_POST['room_type'];
    
    // Basic validation
    if (empty($name) || empty($email) || empty($check_in) || empty($check_out) || empty($room_type)) {
        echo "All fields are required.";
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, check_in, check_out, room_type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $check_in, $check_out, $room_type);

    if ($stmt->execute()) {
        echo "✅ Booking successful!";
        exit;
 
        $to = $email;
        $subject = "Booking Confirmation";
        $message = "Dear $name,\n\nYour booking from $check_in to $check_out for a $room_type room has been confirmed.\n\nThank you!";
        $headers = "From: no-reply@yourhotel.com";

mail($to, $subject, $message, $headers);

    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
