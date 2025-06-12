<?php
  require_once __DIR__ . '/config/db.php';

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

// Seed Customers
$conn->query("DELETE FROM customers"); // Delete customers first to avoid FK errors
$conn->query("
    INSERT INTO customers (name, email, phone)
    VALUES 
    ('John Doe', 'john@example.com', '0712345678'),
    ('Jane Smith', 'jane@example.com', '0787654321'),
    ('Mike Lee', 'mike@example.com', '0755123456'),
    ('Alice Johnson', 'alice@example.com', '0798765432'),
    ('Bob White', 'bob@example.com', '0701234567')
");

// Seed Rooms
$conn->query("DELETE FROM rooms"); // Delete rooms first to avoid FK errors
$conn->query("
    INSERT INTO rooms (type, price, total_rooms)
    VALUES 
    ('Executive Suite', 200000.00, 1),
    ('Twin Bedroom', 150000.00, 2),
    ('Deluxe', 120000.00, 8),
    ('Standard', 80000.00, 14),
    ('Mini Standard', 60000.00, 17)
");

// Get room IDs (now it's `rooms(id)` instead of `room_types(id)`)
$roomRes = $conn->query("SELECT id FROM rooms");
$roomIds = [];
while ($row = $roomRes->fetch_assoc()) {
    $roomIds[] = $row['id'];
}

// Get Admin IDs (to reference for updated_by)
$adminRes = $conn->query("SELECT id FROM admins");
$adminIds = [];
while ($row = $adminRes->fetch_assoc()) {
    $adminIds[] = $row['id'];
}

// Get Customer IDs (to reference for customer_id)
$customerRes = $conn->query("SELECT id FROM customers");
$customerIds = [];
while ($row = $customerRes->fetch_assoc()) {
    $customerIds[] = $row['id'];
}

// Ensure you have at least 3 rooms to seed bookings
if (count($roomIds) >= 3) {
    // Insert bookings with valid room IDs, admin IDs, and customer IDs
    $conn->query("
        INSERT INTO bookings (customer_id, check_in, check_out, room_type_id, status, number_of_rooms, payment_status, payment_method, updated_by)
        VALUES 
        ({$customerIds[0]}, '2025-06-10 14:00:00', '2025-06-12 12:00:00', {$roomIds[0]}, 'confirmed', 1, 'Paid', 'Mobile Money', {$adminIds[0]}),
        ({$customerIds[1]}, '2025-06-15 15:00:00', '2025-06-18 10:00:00', {$roomIds[1]}, 'pending', 2, 'Unpaid', NULL, {$adminIds[0]}),
        ({$customerIds[2]}, '2025-06-20 13:00:00', '2025-06-22 11:00:00', {$roomIds[2]}, 'cancelled', 1, 'Unpaid', NULL, {$adminIds[1]}),
        ({$customerIds[3]}, '2025-07-01 14:00:00', '2025-07-05 12:00:00', {$roomIds[3]}, 'confirmed', 2, 'Paid', 'Cash', {$adminIds[0]}),
        ({$customerIds[4]}, '2025-07-10 15:00:00', '2025-07-12 10:00:00', {$roomIds[4]}, 'pending', 1, 'Unpaid', 'Mobile Money', {$adminIds[1]})
    ");
} else {
    echo "Not enough rooms to seed bookings.\n";
}

// Seed Contacts (optional, based on your requirement)
$conn->query("DELETE FROM contacts"); // Delete any previous contact entries
$conn->query("
    INSERT INTO contacts (name, email, subject, message)
    VALUES 
    ('Customer Service', 'support@example.com', 'Room Inquiry', 'I would like to inquire about room availability for the weekend.'),
    ('Sales', 'sales@example.com', 'Booking Request', 'I am interested in booking the Executive Suite for two nights.'),
    ('General', 'info@example.com', 'General Inquiry', 'Could you please provide more details about your services and amenities?')
");

// Re-enable foreign key checks
$conn->query("SET FOREIGN_KEY_CHECKS=1");

echo "Seeding completed successfully.\n";
$conn->close();
