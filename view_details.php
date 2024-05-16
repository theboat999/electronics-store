<?php
session_start();

if (isset($_GET['id'])) {
    $deviceId = $_GET['id'];
    if (isset($_SESSION['devices'][$deviceId])) {
        $device = $_SESSION['devices'][$deviceId];
    } else {
        echo "Device not found.";
        exit;
    }
} else {
    echo "No device ID specified.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Device Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.html'; ?>
    <div class="content">
        <h1>Device Details</h1>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($device['name']); ?></p>
        <p><strong>Price:</strong> <?php echo '$' . htmlspecialchars($device['price']); ?></p>
        <p><strong>Quantity:</strong> <?php echo htmlspecialchars($device['quantity']); ?></p>
        <button onclick="window.location.href='view_devices.php'">Return</button> <!-- Return button -->
    </div>
</body>
</html>
