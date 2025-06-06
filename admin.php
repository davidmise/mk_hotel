<?php
include 'db.php';

// Handle update form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_payment'])) {
    $booking_id = (int)$_POST['booking_id'];
    $payment_status = $_POST['payment_status'] ?? 'Unpaid';
    $payment_method = $_POST['payment_method'] ?? NULL;

    $stmt = $conn->prepare("UPDATE bookings SET payment_status = ?, payment_method = ? WHERE id = ?");
    $stmt->bind_param("ssi", $payment_status, $payment_method, $booking_id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin.php"); // Redirect to avoid form resubmission
    exit;
}

// Fetch bookings
$query = "
  SELECT 
    bookings.id,
    bookings.name, 
    bookings.email,
    bookings.phone,
    bookings.check_in, 
    bookings.check_out, 
    bookings.number_of_rooms,
    bookings.payment_status,
    bookings.payment_method,
    rooms.type AS room_name, 
    rooms.price AS price, 
    bookings.created_at
  FROM bookings
  LEFT JOIN rooms ON bookings.room_type_id = rooms.id
  ORDER BY bookings.created_at DESC
";


$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Bookings</title>
  <link rel="stylesheet" href="css/php_style.css">
  <style>
    select, input[type="submit"] {
      padding: 4px;
      margin-top: 4px;
    }
  </style>
</head>
<body>
  <h2>All Bookings</h2>
  <table border="1" cellpadding="10">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Check In</th>
      <th>Check Out</th>
      <th>Room</th>
      <th>No. of Rooms</th>
      <th>Payment Status</th>
      <th>Payment Method</th>
      <th>Price (TZS)</th>
      <th>Booked At</th>
      <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <form method="POST">
          <input type="hidden" name="booking_id" value="<?= $row['id'] ?>">
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= !empty($row['phone']) ? htmlspecialchars($row['phone']) : 'N/A' ?></td>
          <td><?= $row['check_in'] ?></td>
          <td><?= $row['check_out'] ?></td>
          <td><?= htmlspecialchars($row['room_name']) ?></td>
          <td><?= (int)$row['number_of_rooms'] ?></td>
          <td>
            <select name="payment_status">
              <option value="Unpaid" <?= $row['payment_status'] === 'Unpaid' ? 'selected' : '' ?>>Unpaid</option>
              <option value="Paid" <?= $row['payment_status'] === 'Paid' ? 'selected' : '' ?>>Paid</option>
            </select>
          </td>
          <td>
            <select name="payment_method">
              <option value="" <?= empty($row['payment_method']) ? 'selected' : '' ?>>-- Select --</option>
              <option value="Cash" <?= $row['payment_method'] === 'Cash' ? 'selected' : '' ?>>Cash</option>
              <option value="Card" <?= $row['payment_method'] === 'Card' ? 'selected' : '' ?>>Card</option>
              <option value="Mobile Money" <?= $row['payment_method'] === 'Mobile Money' ? 'selected' : '' ?>>Mobile Money</option>
            </select>
          </td>
          <td><?= number_format((int)$row['price'] * (int)$row['number_of_rooms']) ?></td>
          <td><?= $row['created_at'] ?></td>
          <td><input type="submit" name="update_payment" value="Update"></td>
        </form>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
