<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission
    if (isset($_POST['id']) && isset($_POST['quantity'])) {
        $deviceId = $_POST['id'];
        $purchaseQuantity = (int)$_POST['quantity'];

        if (isset($_SESSION['devices'][$deviceId])) {
            $device = $_SESSION['devices'][$deviceId];

            if ($device['quantity'] >= $purchaseQuantity && $purchaseQuantity > 0) {
                $_SESSION['devices'][$deviceId]['quantity'] -= $purchaseQuantity;

                // Log the purchase in purchase_history
                $purchaseDetails = [
                    'id' => $deviceId,
                    'name' => $device['name'],
                    'quantity' => $purchaseQuantity,
                    'timestamp' => date('Y-m-d H:i:s')
                ];

                if (!isset($_SESSION['purchase_history'])) {
                    $_SESSION['purchase_history'] = [];
                }

                $_SESSION['purchase_history'][] = $purchaseDetails;

                // Redirect to view_devices.php after successful purchase
                header('Location: view_devices.php');
                exit;
            } else {
                echo "Insufficient stock or invalid quantity.";
                exit;
            }
        } else {
            echo "Device not found.";
            exit;
        }
    } else {
        echo "Invalid request.";
        exit;
    }
} elseif (isset($_GET['id'])) {
    // Display the form to enter the quantity
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
    <title>Buy Device</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.html'; ?>
    <div class="content">
        <h1>Buy Device</h1>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($device['name']); ?></p>
        <p><strong>Price:</strong> <?php echo '$' . htmlspecialchars($device['price']); ?></p>
        <p><strong>Available Quantity:</strong> <?php echo htmlspecialchars($device['quantity']); ?></p>

        <form action="buy_device.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($deviceId); ?>">
            <label for="quantity">Quantity to Buy:</label>
            <input type="number" name="quantity" min="1" max="<?php echo htmlspecialchars($device['quantity']); ?>" required>
            <button type="submit">Buy</button>
        </form>
    </div>
</body>
</html>
