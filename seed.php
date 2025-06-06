<?php
include 'db.php';

// Disable foreign key checks temporarily (to avoid constraint errors)
$conn->query("SET FOREIGN_KEY_CHECKS=0");

// Seed Admins
$conn->query("DELETE FROM admins");
$conn->query("
    INSERT INTO admins (username, password, role)
    VALUES 
    ('admin', '" . password_hash('Mk_Admin@2024', PASSWORD_DEFAULT) . "', 'super'),
    ('staff', '" . password_hash('P@$$w0rd123', PASSWORD_DEFAULT) . "', 'staff')
");

// Seed Rooms
$conn->query("DELETE FROM bookings"); // ✅ Delete bookings first to avoid FK errors
$conn->query("DELETE FROM rooms");

// ✅ Fix missing commas between values
$conn->query("
    INSERT INTO rooms (type, price, total_rooms)
    VALUES 
    ('Executive Suite', 200000.00, 1),
    ('Twin Bedroom', 150000.00, 8),
    ('Deluxe', 120000.00, 2),
    ('Standard', 80000.00, 14),
    ('Mini Standard', 60000.00, 17)
");

// Get room IDs
$roomRes = $conn->query("SELECT id FROM rooms");
$roomIds = [];
while ($row = $roomRes->fetch_assoc()) {
    $roomIds[] = $row['id'];
}

// Ensure you have at least 3 rooms to seed bookings
if (count($roomIds) >= 3) {
    $conn->query("
        INSERT INTO bookings (name, email, phone, check_in, check_out, room_type_id, status, number_of_rooms, payment_status, payment_method, updated_by)
        VALUES 
        ('John Doe', 'john@example.com', '0712345678', '2025-06-10 14:00:00', '2025-06-12 12:00:00', {$roomIds[0]}, 'confirmed', 1, 'Paid', 'Mobile Money', 1),
        ('Jane Smith', 'jane@example.com', '0787654321', '2025-06-15 15:00:00', '2025-06-18 10:00:00', {$roomIds[1]}, 'pending', 2, 'Unpaid', NULL, 1),
        ('Mike Lee', 'mike@example.com', '0755123456', '2025-06-20 13:00:00', '2025-06-22 11:00:00', {$roomIds[2]}, 'cancelled', 1, 'Unpaid', NULL, 2)
    ");
} else {
    echo "Not enough rooms to seed bookings.\n";
}

// Re-enable foreign key checks
$conn->query("SET FOREIGN_KEY_CHECKS=1");

echo "Seeding completed successfully.\n";
$conn->close();
