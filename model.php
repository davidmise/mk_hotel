<?php
// model.php
include 'db.php';

// Function to get all rooms
function getAllRooms($conn) {
    $options = "";
    $sql = "SELECT id, type FROM rooms";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($room = $result->fetch_assoc()) {
            $options .= "<option value='{$room['id']}'>{$room['type']}</option>";
        }
    } else {
        $options = "<option disabled>No room types available</option>";
    }
    return $options;
}

function getAvailableRooms($conn, $room_type_id, $check_in, $check_out) {
    $query = "
        SELECT
            rt.total_rooms,
            (rt.total_rooms - IFNULL(b.booked_rooms, 0)) AS available_rooms
        FROM
            rooms rt
        LEFT JOIN (
            SELECT
                room_type_id,
                SUM(number_of_rooms) AS booked_rooms
            FROM
                bookings
            WHERE
                check_out > ? AND check_in < ?
            GROUP BY
                room_type_id
        ) b ON rt.id = b.room_type_id
        WHERE rt.id = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $check_in, $check_out, $room_type_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();

    return $data ? (int)$data['available_rooms'] : 0;
}


?>
