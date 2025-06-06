<?php 
include 'model.php'; // assumes $conn is a valid MySQLi connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $check_in = $_POST['check_in'] ?? '';
    $check_out = $_POST['check_out'] ?? '';
    $room_type_id = (int)($_POST['room_type_id'] ?? 0);
    $number_of_rooms = (int)($_POST['number_of_rooms'] ?? 1);
    $payment_status = 'Unpaid';
    $payment_method = null;

    // Basic validation
    if (empty($name) || empty($check_in) || empty($check_out) || $room_type_id === 0) {
        echo 'Missing required fields.';
        exit;
    }

    // Email is optional but if filled, validate it
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format.';
        exit;
    }

    if (strtotime($check_in) >= strtotime($check_out)) {
        echo 'Check-out must be after check-in.';
        exit;
    }

    // Check room availability
    $available = getAvailableRooms($conn, $room_type_id, $check_in, $check_out);
    if ($number_of_rooms > $available) {
        echo "Only $available room(s) available for the selected dates.";
        exit;
    }

    // Insert booking
    $stmt = $conn->prepare("INSERT INTO bookings 
        (name, email, phone, check_in, check_out, room_type_id, number_of_rooms, payment_status, payment_method) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("ssssssiss", $name, $email, $phone, $check_in, $check_out, $room_type_id, $number_of_rooms, $payment_status, $payment_method);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'Error saving booking: ' . $stmt->error;
    }

    $stmt->close();
} else {
    echo 'Invalid request.';
}
?>
