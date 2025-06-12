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

// Seed Rooms
$conn->query("DELETE FROM rooms");
$conn->query("
    INSERT INTO rooms (type, price, total_rooms)
    VALUES 
    ('Executive Suite', 200000.00, 1),
    ('Twin Bedroom', 150000.00, 2),
    ('Deluxe', 120000.00, 8),
    ('Standard', 80000.00, 14),
    ('Mini Standard', 60000.00, 17)
");

// Re-enable foreign key checks
$conn->query("SET FOREIGN_KEY_CHECKS=1");

echo "Admins and Rooms tables seeded successfully.\n";
$conn->close();
