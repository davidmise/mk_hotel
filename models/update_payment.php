<?php
include 'db.php';

$booking_id = $_POST['booking_id'];
$payment_status = $_POST['payment_status'];
$payment_method = $_POST['payment_method'];

$sql = "UPDATE bookings SET payment_status = ?, payment_method = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $payment_status, $payment_method, $booking_id);

if ($stmt->execute()) {
    header("Location: admin.php?success=1");
} else {
    echo "Update failed: " . $stmt->error;
}
