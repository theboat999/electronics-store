<?php
session_start();

// Check if devices are stored in the session
if (isset($_SESSION['devices']) && !empty($_SESSION['devices'])) {
    $devices = $_SESSION['devices'];
} else {
    $devices = []; // Initialize as empty if no devices are added yet
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Devices</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link the CSS file -->
</head>
<body>
    <?php include 'header.html'; ?> <!-- Include the header -->

    <div class="content">
        <h1>Added Devices</h1>
        <div class="device-table-container">
            <table class="device-table">
                <thead>
                    <tr>
                        <th>Device Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Actions</th> <!-- Add a new header for actions -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($devices as $deviceId => $device): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($device['name']); ?></td>
                            <td><?php echo '$' . htmlspecialchars($device['price']); ?></td>
                            <td><?php echo htmlspecialchars($device['quantity']); ?></td>
                            <td>
                                <a href="view_details.php?id=<?php echo htmlspecialchars($deviceId); ?>">View Details</a> |
                                <a href="edit_device.php?id=<?php echo htmlspecialchars($deviceId); ?>">Edit</a> |
                                <a href="delete_device.php?id=<?php echo htmlspecialchars($deviceId); ?>" onclick="return confirm('Are you sure you want to delete this device?');">Delete</a> |
                                <a href="buy_device.php?id=<?php echo htmlspecialchars($deviceId); ?>">Buy</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
