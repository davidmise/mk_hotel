<?php
// get_room_availability.php
include 'model.php';

$room_type_id = $_GET['room_type_id'] ?? 0;
$check_in = $_GET['check_in'] ?? '';
$check_out = $_GET['check_out'] ?? '';

if (!$room_type_id || !$check_in || !$check_out) {
    echo json_encode(['error' => 'Missing data']);
    exit;
}

$available = getAvailableRooms($conn, $room_type_id, $check_in, $check_out);

$sql = "SELECT total_rooms FROM rooms WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $room_type_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo json_encode([
    'available_rooms' => $available,
    'total_rooms' => (int)$row['total_rooms']
]);
