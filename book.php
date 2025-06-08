<?php 
include 'model.php'; // assumes $conn is a valid MySQLi connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Show DB errors

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $check_in = $_POST['check_in'] ?? '';
    $check_out = $_POST['check_out'] ?? '';
    $room_type_id = (int)($_POST['room_type_id'] ?? 0);
    $number_of_rooms = (int)($_POST['number_of_rooms'] ?? 1);
    $payment_status = 'Unpaid';
    $payment_method = 'cash'; // Set default or get from form
    $status = 'pending'; // default status

    // Basic validation
    if (empty($name)  || empty($check_in) || empty($check_out) || $room_type_id === 0) {
        echo 'Missing required fields.';
        exit;
    }

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email format.';
        exit;
    }

    if (strtotime($check_in) >= strtotime($check_out)) {
        echo 'Check-out must be after check-in.';
        exit;
    }

    // ✅ Check if customer exists
    $stmt = $conn->prepare("SELECT id FROM customers WHERE phone = ? OR name = ?");
    $stmt->bind_param("ss", $phone, $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
        $customer_id = $customer['id'];
    } else {
        // Insert new customer
        $stmt = $conn->prepare("INSERT INTO customers (name, email, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $phone);
        $stmt->execute();
        $customer_id = $stmt->insert_id;
    }
    $stmt->close();

    // ✅ Check availability
    $available = getAvailableRooms($conn, $room_type_id, $check_in, $check_out);
    if ($number_of_rooms > $available) {
        echo "Only $available room(s) available for the selected dates.";
        exit;
    }

    // ✅ Insert booking
    $stmt = $conn->prepare("INSERT INTO bookings 
        (customer_id, check_in, check_out, room_type_id, number_of_rooms, status, payment_status, payment_method) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssisss", $customer_id, $check_in, $check_out, $room_type_id, $number_of_rooms, $status, $payment_status, $payment_method);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'Booking error: ' . $stmt->error;
    }

    $stmt->close();
} else {
   echo 'Invalid request. Expected POST but got ' . $_SERVER['REQUEST_METHOD'];
}
?>
