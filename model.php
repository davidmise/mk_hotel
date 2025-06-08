    <?php
    // model.php
    include 'db.php';

    // Function to get all rooms
    function getAllRooms($conn) {
        $options = "";
        $sql = "SELECT id, type, price FROM rooms";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($room = $result->fetch_assoc()) {
                $options .= "<option value='{$room['id']}'>{$room['type']} - {$room['price']} /night </option>";
            }
        } else {
            $options = "<option disabled>No room types available</option>";
        }
        return $options;
    }

    function getAvailableRooms($conn, $room_type_id, $check_in, $check_out) {
        $query = "
            SELECT 
                r.total_rooms,
                (
                    r.total_rooms - COALESCE((
                        SELECT SUM(b.number_of_rooms)
                        FROM bookings b
                        WHERE 
                            b.room_type_id = r.id
                            AND b.check_out > ?
                            AND b.check_in < ?
                    ), 0)
                ) AS available_rooms
            FROM rooms r
            WHERE r.id = ?
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
