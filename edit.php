<?php
include 'db.php';
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM bookings WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE bookings SET customer_name=?, email=?, phone=?, service_type=?, guests=?, booking_date=?, booking_time=?, notes=?, status=? WHERE id=?");
    $stmt->bind_param("ssssissssi", $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['service'], $_POST['guests'], $_POST['date'], $_POST['time'], $_POST['notes'], $_POST['status'], $id);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="card mx-auto shadow p-4" style="max-width: 500px;">
        <h4 class="mb-3">Edit Booking</h4>
        <form method="POST">
            <input type="text" name="name" class="form-control mb-2" value="<?= $row['customer_name'] ?>" required>
            <input type="email" name="email" class="form-control mb-2" value="<?= $row['email'] ?>" required>
            <input type="text" name="phone" class="form-control mb-2" value="<?= $row['phone'] ?>" required>
            <input type="text" name="service" class="form-control mb-2" value="<?= $row['service_type'] ?>" required>
            <input type="number" name="guests" class="form-control mb-2" value="<?= $row['guests'] ?>" required>
            <input type="date" name="date" class="form-control mb-2" value="<?= $row['booking_date'] ?>" required>
            <input type="time" name="time" class="form-control mb-2" value="<?= $row['booking_time'] ?>" required>
            <textarea name="notes" class="form-control mb-2"><?= $row['notes'] ?></textarea>
            <select name="status" class="form-select mb-3">
                <option <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option <?= $row['status'] == 'Confirmed' ? 'selected' : '' ?>>Confirmed</option>
                <option <?= $row['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
            </select>
            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</body>
</html>