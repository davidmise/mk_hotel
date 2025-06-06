<?php
include 'db.php';

if (isset($_GET['room_type_id'])) {
    $room_type_id = intval($_GET['room_type_id']);
    $stmt = $conn->prepare("SELECT total_rooms FROM rooms WHERE id = ?");
    $stmt->bind_param("i", $room_type_id);
    $stmt->execute();
    $stmt->bind_result($available);
    $stmt->fetch();
    echo json_encode(['total_rooms' => $available]);
    $stmt->close();
}
?>
