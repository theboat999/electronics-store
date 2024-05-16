<?php
session_start();

if (isset($_POST['id'])) {
    $deviceId = $_POST['id'];
    if (isset($_SESSION['devices'][$deviceId])) {
        $_SESSION['devices'][$deviceId] = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
        ];
        header('Location: view_devices.php');
        exit;
    }
} elseif (isset($_GET['id'])) {
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
    <title>Edit Device</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.html'; ?>
    <div class="content">
        <h1>Edit Device</h1>
        <form action="edit_device.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($deviceId); ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($device['name']); ?>" required><br>
            <label for="price">Price:</label>
            <input type="text" name="price" value="<?php echo htmlspecialchars($device['price']); ?>" required><br>
            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" value="<?php echo htmlspecialchars($device['quantity']); ?>" required><br>
            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
