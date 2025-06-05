<?php
include 'db.php';

$result = $conn->query("SELECT * FROM bookings ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Bookings</title>
  <link rel="stylesheet" href="php_style.css">
</head>
<body>
  <h2>All Bookings</h2>
  <table border="1" cellpadding="10">
    <tr>
      <th>Name</th><th>Email</th><th>Check In</th><th>Check Out</th><th>Room</th><th>Booked At</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= $row['check_in'] ?></td>
        <td><?= $row['check_out'] ?></td>
        <td><?= $row['room_type'] ?></td>
        <td><?= $row['created_at'] ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
